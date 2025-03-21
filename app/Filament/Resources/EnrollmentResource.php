<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class EnrollmentResource extends Resource
{
    protected static ?string $model = Enrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Ghi danh';
    protected static ?string $pluralLabel = 'Ghi danh';
    protected static ?string $modelLabel = 'Ghi danh';
    protected static ?string $slug = 'ghi-danh'; 
    protected static ?string $navigationGroup = 'Quản Lý Môn Học';
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

            Toggle::make('status')
                ->label('Trạng thái duyệt')
                ->helperText('Bật để duyệt, tắt để từ chối')
                ->default(false),
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

            TextColumn::make('created_at')
                ->label('Ngày ghi danh')
                ->dateTime('d/m/Y'),

            TextColumn::make('status')
                ->label('Trạng thái')
                ->formatStateUsing(fn (int $state): string => match ($state) {
                    0 => 'Chờ duyệt',
                    1 => 'Đã duyệt',
                    default => 'Không xác định',
                })
                ->color(fn (int $state): string => match ($state) {
                    0 => 'warning',
                    1 => 'success',
                    default => 'gray',
                }),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->label('Duyệt')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (Enrollment $record): bool => $record->status === 0)
                    ->action(function (Enrollment $record): void {
                        $record->update(['status' => 1]);
                    }),
                Tables\Actions\Action::make('reject')
                    ->label('Từ chối')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (Enrollment $record): bool => $record->status === 0)
                    ->action(function (Enrollment $record): void {
                        $record->update(['status' => 0]);
                    }),
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
            'index' => Pages\ListEnrollments::route('/'),
            'create' => Pages\CreateEnrollment::route('/create'),
            'edit' => Pages\EditEnrollment::route('/{record}/edit'),
        ];
    }
}
