<?php

namespace App\Filament\Resources\StoryResource\Pages;

use App\Filament\Resources\StoryResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ShowStory extends ViewRecord
{
    protected static string $resource = StoryResource::class;

    protected static string $view = 'filament.resources.views.story.view'; // ✅ this line tells it to use your Blade
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
