<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class VisitorsChart extends ChartWidget
{
    protected static ?string $heading = 'Návštěvnost';

    protected function getData(): array
    {
        $dates = collect(range(6, 0))->map(function ($daysAgo) {
            return Carbon::today()->subDays($daysAgo)->format('Y-m-d');
        });

        $visits = $dates->map(function ($date) {
            return Cache::get("visits_{$date}", 0);
        });

        return [
            'datasets' => [
                [
                    'label' => 'Počet návštěv',
                    'data' => $visits,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $dates->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Možnosti: 'bar', 'line', 'pie'
    }
}
