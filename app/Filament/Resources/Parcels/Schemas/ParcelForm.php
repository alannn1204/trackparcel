<?php

namespace App\Filament\Resources\Parcels\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Components\Select;


class ParcelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tracking_number')
                    ->required(),
                Select::make('storage')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                    ]),
                TextInput::make('customer_name')
                    ->required(),
                DatePicker::make('delivery_date'),
                DatePicker::make('pickup_date'),
                Select::make('status')
                    ->options([
                        'Pending / Processing' => 'Pending / Processing',
                        'Ready for Delivery' => 'Ready for Delivery',
                        'Delivered' => 'Delivered',
                    ]),
                    
            ]);
    }
}
