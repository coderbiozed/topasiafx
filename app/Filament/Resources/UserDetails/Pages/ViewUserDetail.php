<?php

namespace App\Filament\Resources\UserDetails\Pages;

use App\Filament\Resources\UserDetails\UserDetailResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUserDetail extends ViewRecord
{
    protected static string $resource = UserDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
