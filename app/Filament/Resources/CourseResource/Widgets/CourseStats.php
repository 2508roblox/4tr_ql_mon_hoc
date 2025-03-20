<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Course;
use App\Models\Material;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class CourseStats extends BaseWidget
{
    protected function getCards(): array
    {
        $user = Auth::user();
        $isTeacher = $user->role === 'giảng viên';
        $userId = $user->id;

        return [
            $this->createCard('Tổng số môn học', Course::class, 'heroicon-o-bookmark-square', 'primary', $isTeacher, $userId),
            $this->createCard('Tổng số bài giảng', Material::class, 'heroicon-o-document-text', 'success', $isTeacher, $userId),
            $this->createCard('Tổng số học sinh tham gia', Enrollment::class, 'heroicon-o-user-group', 'info', $isTeacher, $userId),
        ];
    }

    private function createCard($title, $model, $icon, $color, $isTeacher, $userId)
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
            ->chart($this->generateChartData($query));
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? "+100%" : "0%";
        }

        $change = (($current - $previous) / $previous) * 100;
        return ($change >= 0 ? "+" : "") . round($change, 2) . "%";
    }

    private function generateChartData($query)
    {
        return collect(range(5, 0))->map(function ($i) use ($query) {
            return $query->whereMonth('created_at', now()->subMonths($i)->month)->count();
        })->toArray();
    }
}
