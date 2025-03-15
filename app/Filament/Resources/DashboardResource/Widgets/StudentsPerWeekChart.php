<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;
use App\Models\Material;
use Carbon\Carbon;
class StudentsPerWeekChart extends ChartWidget
{
    protected static ?string $heading = 'Số lượng sinh viên theo tuần';

    protected function getData(): array
    {
        $data = collect(range(6, 0))->map(function ($week) {
            $startOfWeek = Carbon::now()->subWeeks($week)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($week)->endOfWeek();

            return Student::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
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
