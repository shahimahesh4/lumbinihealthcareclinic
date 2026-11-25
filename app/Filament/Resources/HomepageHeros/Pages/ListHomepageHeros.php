<?php

namespace App\Filament\Resources\HomepageHeros\Pages;

use App\Filament\Resources\HomepageHeros\HomepageHeroResource;
use App\Models\HomepageHero;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomepageHeros extends ListRecords
{
    protected static string $resource = HomepageHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->visible(fn (): bool => HomepageHero::query()->doesntExist()),
        ];
    }
}
