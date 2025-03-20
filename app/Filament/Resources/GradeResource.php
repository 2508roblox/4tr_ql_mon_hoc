<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeResource\Pages;
use App\Filament\Resources\GradeResource\RelationManagers;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Bảng điểm';
    protected static ?string $pluralLabel = 'Bảng điểm';
    protected static ?string $slug = 'bang-diem';
    protected static ?string $modelLabel = 'Điểm số';
    protected static ?string $navigationGroup = 'Quản lý Học tập';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(2)->schema([
                Section::make('Thông tin Bảng điểm')
                    ->schema([
                        Select::make('course_id')
                            ->label('Môn học')
                            ->options(Course::pluck('course_name', 'id'))
                            ->searchable()
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('grade_name')
                            ->label('Tên bảng điểm')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('file_path')
                            ->label('File bảng điểm')
                            ->directory('grade-files')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('grade_name')
                ->label('Tên bảng điểm')
                ->sortable()
                ->searchable(),

            TextColumn::make('course.course_name')
                ->label('Môn học')
                ->sortable()
                ->searchable(),

            TextColumn::make('file_path')
                ->label('File đính kèm')
                ->toggleable(),

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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
