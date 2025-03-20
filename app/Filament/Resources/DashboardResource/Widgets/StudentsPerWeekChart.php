<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;
use App\Models\Material;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentsPerWeekChart extends ChartWidget
{
    protected static ?string $heading = 'Số lượng sinh viên theo tuần';

    protected function getData(): array
    {
        $user = Auth::user();
        $isTeacher = $user->role === 'giảng viên';
        $userId = $user->id;

        $data = collect(range(6, 0))->map(function ($week) use ($isTeacher, $userId) {
            $startOfWeek = Carbon::now()->subWeeks($week)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($week)->endOfWeek();

            $query = Student::whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            
            if ($isTeacher) {
                $query->whereHas('enrollments.course', function ($q) use ($userId) {
                    $q->where('created_by', $userId);
                });
            }

            return $query->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Số sinh viên',
                    'data' => $data->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                ],
            ],
            'labels' => collect(range(6, 0))->map(fn($week) => 'Tuần ' . (7 - $week))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
