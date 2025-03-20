<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Filament\Resources\MaterialResource\RelationManagers;
use App\Models\Course;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Bài học';
    protected static ?string $pluralLabel = 'Bài học';
    protected static ?string $slug = 'bai-hoc';
    protected static ?string $modelLabel = 'Bài học';
    protected static ?string $navigationGroup = 'Quản Lý Môn Học';

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        $isTeacher = $user->role === 'giảng viên';
        $userId = $user->id;

        $courseQuery = Course::query();
        if ($isTeacher) {
            $courseQuery->where('created_by', $userId);
        }

        return $form
        ->schema([
            Grid::make(2)->schema([
                Section::make('Thông tin bài học')
                    ->schema([
                        Select::make('course_id')
                            ->label('Thuộc môn học')
                            ->options($courseQuery->pluck('course_name', 'id'))
                            ->searchable()
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Tiêu đề')
                            ->required()
                            ->maxLength(255)
                            ->live(debounce: 500)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->columnSpanFull(),
        
                        TextInput::make('slug')
                            ->label('Slug')
                     
                            ->columnSpanFull(),
        
                        RichEditor::make('short_description')
                            ->label('Mô tả ngắn')
                            ->columnSpanFull(),
        
                        RichEditor::make('description')
                            ->label('Mô tả chi tiết')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
        
                    Repeater::make('lessonResources')
                    ->label('Tài liệu bài học')
                    ->relationship('lessonResources')
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên tài liệu')
                            ->required(),

                        FileUpload::make('file_path')   
                            ->label('Tải tệp')
                            ->directory('lesson_files')
                            ->maxSize(102400)
                            ->preserveFilenames()
                            ->downloadable(false)
                            ->previewable(false)
                            ->visibility('private')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->addActionLabel('Thêm tài liệu mới'),
            ]),
        ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('title')
                ->label('Tiêu đề')
                ->searchable()
                ->sortable(),

            TextColumn::make('course.course_name')
                ->label('Thuộc môn học')
                ->sortable()
                ->searchable(),

            IconColumn::make('file_path')
                ->label('Tệp đính kèm')
                ->boolean(),

            TextColumn::make('created_at')
                ->label('Ngày tạo')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view_video')
                    ->label('Xem tài liệu bài học')
                    ->icon('heroicon-o-document-text')
                    ->url(fn (Material $record): string => 
                        static::getUrl('view-video', ['record' => $record])
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();
                if ($user->role === 'giảng viên') {
                    $query->whereHas('course', function ($q) use ($user) {
                        $q->where('created_by', $user->id);
                    });
                }
            });
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
            'view-video' => Pages\ViewVideo::route('/{record}/video'),
        ];
    }
}
