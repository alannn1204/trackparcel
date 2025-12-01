<?php

namespace App\Filament\Widgets;

use App\Models\Parcel;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestParcels extends BaseWidget
{
    protected static ?int $sort = 1; // urutan dalam dashboard
    protected static ?string $heading = 'Latest Parcels';
    protected static bool $isLazy = false;
    protected int|string|array $columnSpan = 'full';


    protected function getTableQuery(): ?Builder
    {
        return Parcel::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('tracking_number')
                ->label('Tracking No')
                ->searchable(),

            Tables\Columns\TextColumn::make('customer_name')
                ->label('Customer'),

            Tables\Columns\TextColumn::make('storage')
                ->label('No. Rack'),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->colors([
                    'info' => 'Pending / Processing',
                    'warning' => 'Ready for Delivery',
                    'success' => 'Delivered',
                ]),

            //Tables\Columns\TextColumn::make('created_at')
             //   ->dateTime()
             //   ->label('Created'),
        ];
    }
}
