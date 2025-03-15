<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Điểm danh';
    protected static ?string $pluralLabel = 'Điểm danh';
    protected static ?string $modelLabel = 'Điểm danh';
    protected static ?string $slug = 'diem-danh';
    protected static ?string $navigationGroup = 'Quản lý Học viên';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Sinh viên')
                    ->options(Student::pluck('full_name', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('course_id')
                    ->label('Khóa học')
                    ->options(Course::pluck('course_name', 'id'))
                    ->searchable()
                    ->required(),

                DatePicker::make('date')
                    ->label('Ngày điểm danh')
                    ->required(),

                Toggle::make('status')
                    ->label('Có mặt')
                    ->onIcon('heroicon-o-check-circle')
                    ->offIcon('heroicon-o-x-circle')
                    ->inline(false),
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
                ->label('Khóa học')
                ->sortable()
                ->searchable(),

            TextColumn::make('date')
                ->label('Ngày điểm danh')
                ->date('d/m/Y')
                ->sortable(),

                BadgeColumn::make('status')
                ->label('Trạng thái')
                ->formatStateUsing(fn ($state) => $state ? 'Có mặt' : 'Vắng mặt')
                ->color(fn ($state) => $state ? 'success' : 'danger'),
            
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
