<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\Cache;

class VisitorStats extends BaseWidget
{
    protected function getCards(): array
    {
        // Simulace dat z cache (například ukládání návštěvnosti)
        $totalVisits = Cache::get('total_visits', 0);
        $uniqueVisitors = Cache::get('unique_visitors', 0);

        return [
            Card::make('Celkové návštěvy', $totalVisits)
                ->description('Počet návštěv na webu')
                ->chart([10, 20, 30, 40, 50, 60, 70]) // Simulace růstu návštěv
                ->color('success'),

            Card::make('Unikátní návštěvníci', $uniqueVisitors)
                ->description('Počet unikátních návštěvníků')
                ->chart([5, 15, 25, 35, 45, 55, 65])
                ->color('primary'),
        ];
    }
}
