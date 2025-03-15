<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Course;
use App\Models\Material;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Feedback;
use App\Models\Grade;
use App\Models\Attendance;
use Filament\Widgets\StatsOverviewWidget as BaseWidge;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStatsWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 4; // Hiển thị 4 card trên một hàng
    }

    protected function getCards(): array
    {
        return [
            $this->createCard('Tổng số môn học', Course::class, 'heroicon-o-academic-cap', 'info'),
            $this->createCard('Tổng số bài học', Material::class, 'heroicon-o-book-open', 'primary'),
            $this->createCard('Tổng số sinh viên', Student::class, 'heroicon-o-user-group', 'success'),
            $this->createCard('Tổng số lượt đăng ký', Enrollment::class, 'heroicon-o-clipboard', 'warning'),
            $this->createCard('Tổng số tài liệu', Material::class, 'heroicon-o-document-text', 'gray'),
            $this->createCard('Tổng số phản hồi', Feedback::class, 'heroicon-o-chat-bubble-left-right', 'pink'),
            $this->createCard('Tổng số điểm số đã nhập', Grade::class, 'heroicon-o-pencil-square', 'cyan'),
            $this->createCard('Tổng số lượt điểm danh', Attendance::class, 'heroicon-o-check-circle', 'emerald'),
        ];
    }

    private function createCard($title, $model, $icon, $color)
    {
        $totalCount = $model::count();
        $currentMonthCount = $model::whereMonth('created_at', now()->month)->count();
        $previousMonthCount = $model::whereMonth('created_at', now()->subMonth()->month)->count();
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
        return collect(range(5, 0))->map(function ($i) use ($model) {
            return $model::whereMonth('created_at', now()->subMonths($i)->month)->count();
        })->toArray();
    }
}
