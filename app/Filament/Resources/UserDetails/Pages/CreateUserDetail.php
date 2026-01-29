<?php

namespace App\Filament\Resources\UserDetails\Pages;

use App\Filament\Resources\UserDetails\UserDetailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUserDetail extends CreateRecord
{
    protected static string $resource = UserDetailResource::class;
}
