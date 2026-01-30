<?php

namespace App\Filament\Resources\UserDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class UserDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User'),
                TextColumn::make('phone')
                    ->label('Phone'),
                TextColumn::make('address')
                    ->label('Address'),
                TextColumn::make('bio')
                    ->label('Bio')
                    ->limit(50), // truncate long text
                ImageColumn::make('avatar')
                    ->label('Avatar')
                    ->circular(), // rounded avatar
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
