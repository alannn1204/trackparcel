<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Parcel;



class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Parcels', Parcel::count())
                ->description('Semua parcel')
                ->descriptionIcon('heroicon-m-archive-box'),

            Stat::make('Pending', Parcel::where('status', 'Pending')->count())
                ->description('Belum diproses')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Delivered', Parcel::where('status', 'Delivered')->count())
                ->description('Siap Pickup')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),

            Stat::make('Today Created', Parcel::whereDate('created_at', today())->count())
                ->description('Jumlah hari ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
        ];
    }
}
