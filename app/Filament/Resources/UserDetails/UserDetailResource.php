<?php

namespace App\Filament\Resources\UserDetails;

use App\Filament\Resources\UserDetails\Pages\CreateUserDetail;
use App\Filament\Resources\UserDetails\Pages\EditUserDetail;
use App\Filament\Resources\UserDetails\Pages\ListUserDetails;
use App\Filament\Resources\UserDetails\Pages\ViewUserDetail;
use App\Filament\Resources\UserDetails\Schemas\UserDetailForm;
use App\Filament\Resources\UserDetails\Schemas\UserDetailInfolist;
use App\Filament\Resources\UserDetails\Tables\UserDetailsTable;
use App\Models\UserDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserDetailResource extends Resource
{
    protected static ?string $model = UserDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'o1400300234';

    public static function form(Schema $schema): Schema
    {
        return UserDetailForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserDetailInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserDetailsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserDetails::route('/'),
            'create' => CreateUserDetail::route('/create'),
            'view' => ViewUserDetail::route('/{record}'),
            'edit' => EditUserDetail::route('/{record}/edit'),
        ];
    }
}
