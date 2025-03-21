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
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

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
        $user = Auth::user();
        $courseQuery = Course::query();
        
        // Nếu là giảng viên, chỉ hiển thị các khóa học của họ
        if ($user->role === 'giảng viên') {
            $courseQuery->where('created_by', $user->id);
        }

        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Sinh viên')
                    ->options(Student::pluck('full_name', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('course_id')
                    ->label('Khóa học')
                    ->options($courseQuery->pluck('course_name', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('week')
                    ->label('Tuần')
                    ->options(array_combine(range(1, 12), range(1, 12)))
                    ->required()
                    ->helperText('Tuần học từ 1-12'),

                DatePicker::make('date')
                    ->label('Ngày điểm danh')
                    ->required()
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d'),

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
        ->headerActions([
            Tables\Actions\Action::make('reset_attendance')
                ->label('Reset điểm danh cá nhân')
                ->icon('heroicon-o-arrow-path')
                ->form([
                    Select::make('student_id')
                        ->label('Sinh viên')
                        ->options(Student::pluck('full_name', 'id'))
                        ->searchable()
                        ->required(),

                    Select::make('course_id')
                        ->label('Khóa học')
                        ->options(function () {
                            $user = Auth::user();
                            $query = Course::query();
                            if ($user->role === 'giảng viên') {
                                $query->where('created_by', $user->id);
                            }
                            return $query->pluck('course_name', 'id');
                        })
                        ->searchable()
                        ->required(),

                    MultiSelect::make('weeks')
                        ->label('Tuần cần reset')
                        ->options(array_combine(range(1, 12), range(1, 12)))
                        ->required()
                        ->helperText('Chọn các tuần cần reset điểm danh'),
                ])
                ->action(function (array $data) {
                    $updated = Attendance::query()
                        ->where('student_id', $data['student_id'])
                        ->where('course_id', $data['course_id'])
                        ->whereIn('week', $data['weeks'])
                        ->update(['status' => 0]);

                    Notification::make()
                        ->title('Reset điểm danh thành công')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Reset điểm danh cá nhân')
                ->modalDescription('Bạn có chắc chắn muốn reset điểm danh cho các tuần đã chọn?')
                ->modalSubmitActionLabel('Đồng ý')
                ->modalCancelActionLabel('Hủy'),

            Tables\Actions\Action::make('reset_course_attendance')
                ->label('Reset điểm danh toàn khóa')
                ->icon('heroicon-o-arrow-path-rounded-square')
                ->color('danger')
                ->form([
                    Select::make('course_id')
                        ->label('Khóa học')
                        ->options(function () {
                            $user = Auth::user();
                            $query = Course::query();
                            if ($user->role === 'giảng viên') {
                                $query->where('created_by', $user->id);
                            }
                            return $query->pluck('course_name', 'id');
                        })
                        ->searchable()
                        ->required(),

                    MultiSelect::make('weeks')
                        ->label('Tuần cần reset')
                        ->options(array_combine(range(1, 12), range(1, 12)))
                        ->required()
                        ->helperText('Chọn các tuần cần reset điểm danh'),
                ])
                ->action(function (array $data) {
                    $updated = Attendance::query()
                        ->where('course_id', $data['course_id'])
                        ->whereIn('week', $data['weeks'])
                        ->update(['status' => 0]);

                    $course = Course::find($data['course_id']);
                    $weekCount = count($data['weeks']);

                    Notification::make()
                        ->title("Đã reset điểm danh {$weekCount} tuần của khóa học {$course->course_name}")
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Reset điểm danh toàn khóa')
                ->modalDescription('CẢNH BÁO: Hành động này sẽ reset điểm danh của TẤT CẢ sinh viên trong khóa học cho các tuần đã chọn!')
                ->modalSubmitActionLabel('Đồng ý')
                ->modalCancelActionLabel('Hủy')
        ])
        ->columns([
            TextColumn::make('student.full_name')
                ->label('Sinh viên')
                ->sortable()
                ->searchable(),

            TextColumn::make('course.course_name')
                ->label('Khóa học')
                ->sortable()
                ->searchable(),

            TextColumn::make('week')
                ->label('Tuần')
                ->sortable(),

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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();
                if ($user->role === 'giảng viên') {
                    $query->whereHas('course', function (Builder $courseQuery) use ($user) {
                        $courseQuery->where('created_by', $user->id);
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
