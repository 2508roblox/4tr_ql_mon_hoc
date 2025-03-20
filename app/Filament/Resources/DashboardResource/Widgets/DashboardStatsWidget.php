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
use Illuminate\Support\Facades\Auth;

class DashboardStatsWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 4; // Hiển thị 4 card trên một hàng
    }

    protected function getCards(): array
    {
        $user = Auth::user();
        $isTeacher = $user->role === 'giảng viên';
        $userId = $user->id;

        return [
            $this->createCard('Tổng số môn học', Course::class, 'heroicon-o-academic-cap', 'info', $isTeacher, $userId),
            $this->createCard('Tổng số bài học', Material::class, 'heroicon-o-book-open', 'primary', $isTeacher, $userId),
            $this->createCard('Tổng số sinh viên', Student::class, 'heroicon-o-user-group', 'success', $isTeacher, $userId),
            $this->createCard('Tổng số lượt đăng ký', Enrollment::class, 'heroicon-o-clipboard', 'warning', $isTeacher, $userId),
            $this->createCard('Tổng số tài liệu', Material::class, 'heroicon-o-document-text', 'gray', $isTeacher, $userId),
            $this->createCard('Tổng số phản hồi', Feedback::class, 'heroicon-o-chat-bubble-left-right', 'pink', $isTeacher, $userId, 'rgba(236, 72, 153, 0.5)', 'rgba(236, 72, 153, 1)'),
            $this->createCard('Tổng số điểm số đã nhập', Grade::class, 'heroicon-o-pencil-square', 'cyan', $isTeacher, $userId, 'rgba(6, 182, 212, 0.5)', 'rgba(6, 182, 212, 1)'),
            $this->createCard('Tổng số lượt điểm danh', Attendance::class, 'heroicon-o-check-circle', 'emerald', $isTeacher, $userId, 'rgba(16, 185, 129, 0.5)', 'rgba(16, 185, 129, 1)'),
        ];
    }

    private function createCard($title, $model, $icon, $color, $isTeacher, $userId, $chartBgColor = null, $chartBorderColor = null)
    {
        $query = $model::query();
        
        if ($isTeacher) {
            if ($model === Course::class) {
                $query->where('created_by', $userId);
            } elseif ($model === Material::class) {
                $query->whereHas('course', function ($q) use ($userId) {
                    $q->where('created_by', $userId);
                });
            } elseif ($model === Enrollment::class) {
                $query->whereHas('course', function ($q) use ($userId) {
                    $q->where('created_by', $userId);
                });
            } elseif ($model === Feedback::class) {
                $query->whereHas('course', function ($q) use ($userId) {
                    $q->where('created_by', $userId);
                });
            } elseif ($model === Grade::class) {
                $query->whereHas('course', function ($q) use ($userId) {
                    $q->where('created_by', $userId);
                });
            } elseif ($model === Attendance::class) {
                $query->whereHas('course', function ($q) use ($userId) {
                    $q->where('created_by', $userId);
                });
            }
        }

        $totalCount = $query->count();
        $currentMonthCount = $query->whereMonth('created_at', now()->month)->count();
        $previousMonthCount = $query->whereMonth('created_at', now()->subMonth()->month)->count();
        $percentageChange = $this->calculatePercentageChange($currentMonthCount, $previousMonthCount);

        return Card::make($title, $totalCount)
            ->icon($icon)
            ->color($color)
            ->description("Tháng này: {$currentMonthCount} ({$percentageChange})")
            ->descriptionIcon($percentageChange > 0 ? 'heroicon-o-arrow-trending-up' : 'heroicon-o-arrow-trending-down')
            ->chart($this->generateChartData($query, $chartBgColor, $chartBorderColor));
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? "+100%" : "0%";
        }
        $change = (($current - $previous) / $previous) * 100;
        return ($change >= 0 ? "+" : "") . round($change, 2) . "%";
    }

    private function generateChartData($query, $bgColor = null, $borderColor = null)
    {
        $data = collect(range(5, 0))->map(function ($i) use ($query) {
            return $query->whereMonth('created_at', now()->subMonths($i)->month)->count();
        })->toArray();

        if ($bgColor && $borderColor) {
            return [
                'datasets' => [
                    [
                        'data' => $data,
                        'backgroundColor' => $bgColor,
                        'borderColor' => $borderColor,
                    ],
                ],
            ];
        }

        return $data;
    }
}
