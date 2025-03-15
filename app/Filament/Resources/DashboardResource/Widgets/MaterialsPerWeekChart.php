<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;
use App\Models\Material;
use Carbon\Carbon;
class MaterialsPerWeekChart extends ChartWidget
{
    protected static ?string $heading = 'Số lượng bài học theo tuần';

    protected function getData(): array
    {
        $data = collect(range(6, 0))->map(function ($week) {
            $startOfWeek = Carbon::now()->subWeeks($week)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($week)->endOfWeek();

            return Material::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Số bài học',
                    'data' => $data->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                ],
            ],
            'labels' => collect(range(6, 0))->map(fn($week) => 'Tuần ' . (7 - $week))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
