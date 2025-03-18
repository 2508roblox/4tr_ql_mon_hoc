<?php

namespace App\Filament\Resources\EnrollmentResource\Pages;

use App\Filament\Resources\EnrollmentResource;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Course;
use App\Models\Enrollment;

class ViewStudents extends Page
{
    protected static string $resource = EnrollmentResource::class;

    protected static string $view = 'filament.resources.enrollment-resource.pages.view-students';

    public Course $record;
    public $student_id;

    public function createEnrollment()
    {
        $this->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        // Kiểm tra xem sinh viên đã được ghi danh chưa
        $exists = Enrollment::where('course_id', $this->record->id)
            ->where('student_id', $this->student_id)
            ->exists();

        if ($exists) {
            $this->addError('student_id', 'Sinh viên này đã được ghi danh vào lớp.');
            return;
        }

        // Tạo ghi danh mới
        Enrollment::create([
            'course_id' => $this->record->id,
            'student_id' => $this->student_id,
        ]);

        $this->student_id = null;
        $this->dispatch('close-modal', id: 'create-enrollment');
        $this->notify('success', 'Thêm sinh viên thành công!');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->record->enrollments()->getQuery())
            ->columns([
                Tables\Columns\TextColumn::make('student.full_name')
                    ->label('Họ và tên')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('student.student_id')
                    ->label('Mã học sinh')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('student.email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày ghi danh')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
} 