<?php

namespace App\Filament\Resources\UserDetails\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use App\Models\User;

class UserDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->maxLength(20),
                Forms\Components\TextInput::make('address')
                    ->label('Address')
                    ->maxLength(255),
                Forms\Components\Textarea::make('bio')
                    ->label('Bio')
                    ->rows(3),
                Forms\Components\FileUpload::make('avatar')
                    ->label('Avatar')
                    ->image()
                    ->directory('avatars')
                    ->maxSize(1024), // 1 MB
            ]);
    }
}
