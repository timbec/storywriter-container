<?php

namespace App\Filament\Resources\StorybookUserResource\Pages;

use App\Filament\Resources\StorybookUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStorybookUser extends EditRecord
{
    protected static string $resource = StorybookUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
