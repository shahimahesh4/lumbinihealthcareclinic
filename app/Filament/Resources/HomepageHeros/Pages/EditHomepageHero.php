<?php

namespace App\Filament\Resources\HomepageHeros\Pages;

use App\Filament\Resources\HomepageHeros\HomepageHeroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomepageHero extends EditRecord
{
    protected static string $resource = HomepageHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
