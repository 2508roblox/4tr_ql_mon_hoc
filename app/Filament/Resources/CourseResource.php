<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Filament\Resources\CourseResource\Widgets\CourseStats;
use App\Models\Course;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Môn học';
    protected static ?string $pluralLabel = 'Môn học';
    protected static ?string $slug = 'mon-hoc'; // Đường dẫn trên menu admin
    protected static ?string $modelLabel = 'Môn học';
    protected static ?string $navigationGroup = 'Quản lý Môn học';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(2)->schema([
                Section::make('Thông tin chính')
                    ->schema([
                        TextInput::make('course_name')
                            ->label('Tên môn học')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->live(debounce: 500) // Cập nhật theo thời gian thực
                            ->afterStateUpdated(fn ($state, callable $set) => 
                                $set('slug', \Illuminate\Support\Str::slug($state))
                            ) ,

                            TextInput::make('slug')
                            ->label('Slug')
                        // Không cho người dùng chỉnh sửa
                           // Vẫn gửi giá trị lên server
                            ->columnSpanFull(),
                        RichEditor::make('short_description')
                            ->label('Mô tả ngắn')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Chi tiết khóa học')
                    ->schema([
                        RichEditor::make('description')
                            ->label('Mô tả chi tiết')
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('Ảnh môn học')
                            ->image()
                            ->directory('course_images')
                            ->columnSpanFull(),

                        TextInput::make('views')
                            ->label('Lượt xem')
                            ->default(0)
                            ->numeric()
                            ->disabled(),
                    ])
                    ->columns(1),
            ]),

            Section::make('Thông tin người tạo')
                ->schema([
                    Select::make('created_by')
                        ->label('Người tạo khóa học')
                        ->options(User::pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('image')
                ->label('Ảnh')
                ->circular(),

            TextColumn::make('course_name')
                ->sortable()
                ->searchable()
                ->label('Tên môn học')
                ->limit(50),

            TextColumn::make('short_description')
                ->label('Mô tả ngắn')
                ->html()
                ->limit(80),

            TextColumn::make('views')
                ->sortable()
                ->label('Lượt xem'),

            TextColumn::make('creator.name')
                ->label('Người tạo')
                ->sortable()
                ->searchable(),

            TextColumn::make('created_at')
                ->dateTime('d/m/Y H:i')
                ->sortable()
                ->label('Ngày tạo'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function getWidgets(): array
    {
        return [
            CourseStats::class,
        ];
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
