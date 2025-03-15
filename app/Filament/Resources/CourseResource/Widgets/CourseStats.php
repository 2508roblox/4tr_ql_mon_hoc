<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Course;
use App\Models\Material;
use App\Models\Enrollment;

class CourseStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            $this->createCard('Tổng số môn học', Course::class, 'heroicon-o-bookmark-square', 'primary'),
            $this->createCard('Tổng số bài giảng', Material::class, 'heroicon-o-document-text', 'success'),
            $this->createCard('Tổng số học sinh tham gia', Enrollment::class, 'heroicon-o-user-group', 'info'),
        ];
    }

    private function createCard($title, $model, $icon, $color)
    {
        // Tổng số tất cả thời gian
        $totalCount = $model::count();

        // Số lượng tháng này
        $currentMonthCount = $model::whereMonth('created_at', now()->month)->count();

        // Số lượng tháng trước
        $previousMonthCount = $model::whereMonth('created_at', now()->subMonth()->month)->count();

        // Tính phần trăm tăng/giảm
        $percentageChange = $this->calculatePercentageChange($currentMonthCount, $previousMonthCount);

        return Card::make($title, $totalCount)
            ->icon($icon)
            ->color($color)
            ->description("Tháng này: {$currentMonthCount} ({$percentageChange})")
            ->descriptionIcon($percentageChange > 0 ? 'heroicon-o-arrow-trending-up' : 'heroicon-o-arrow-trending-down')
            ->chart($this->generateChartData($model));
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? "+100%" : "0%";
        }

        $change = (($current - $previous) / $previous) * 100;
        return ($change >= 0 ? "+" : "") . round($change, 2) . "%";
    }

    private function generateChartData($model)
    {
        // Lấy số lượng từng tháng trong 6 tháng gần nhất
        return collect(range(5, 0))->map(function ($i) use ($model) {
            return $model::whereMonth('created_at', now()->subMonths($i)->month)->count();
        })->toArray();
    }
}
