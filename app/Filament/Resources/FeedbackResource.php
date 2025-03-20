<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $table = 'feedbacks';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Đánh giá bài học';
    protected static ?string $pluralLabel = 'Đánh giá bài học';
    protected static ?string $slug = 'danh-gia-bai-hoc';
    protected static ?string $modelLabel = 'Đánh giá';
    protected static ?string $navigationGroup = 'Quản lý Học tập';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(2)->schema([
                Section::make('Thông tin Đánh giá')
                    ->schema([
                        Select::make('student_id')
                            ->label('Sinh viên')
                            ->options(Student::pluck('full_name', 'id'))
                            ->searchable()
                            ->required()
                            ->columnSpanFull(),

                        Select::make('course_id')
                            ->label('Môn học')
                            ->options(Course::pluck('course_name', 'id'))
                            ->searchable()
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('understand')
                            ->label('Hiểu bài')
                            ->onColor('success')
                            ->offColor('danger')
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Mô tả chi tiết')
                    ->schema([
                        Textarea::make('comment')
                            ->label('Nhận xét của sinh viên')
                            ->placeholder('Nhập đánh giá về bài học...')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->columns(1),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('student.full_name')
                ->label('Sinh viên')
                ->sortable()
                ->searchable(),

            TextColumn::make('course.course_name')
                ->label('Môn học')
                ->sortable()
                ->searchable(),

                BadgeColumn::make('understand')
                ->label('Hiểu bài')
                ->formatStateUsing(fn ($state) => $state ? 'Hiểu' : 'Chưa hiểu')
                ->color(fn ($state) => $state ? 'success' : 'danger')
                ->sortable(),
            

            TextColumn::make('comment')
                ->label('Nhận xét')
                ->limit(50)
                ->tooltip(fn ($state) => $state),

            TextColumn::make('created_at')
                ->label('Ngày đánh giá')
                ->dateTime('d/m/Y'),
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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
