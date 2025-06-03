<?php

namespace App\Filament\Resources\StorybookUserResource\Pages;

use App\Filament\Resources\StorybookUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStorybookUsers extends ListRecords
{
    protected static string $resource = StorybookUserResource::class;

    protected function getHeaderActions(): array
    {

        // dd(\App\Models\StorybookUser::all());
        return [
            Actions\CreateAction::make(),
        ];
    }
}
