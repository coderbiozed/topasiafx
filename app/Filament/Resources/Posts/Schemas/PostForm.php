<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Post Content')
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Textarea::make('excerpt')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),

                                RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Meta & Media')
                            ->columnSpan(1)
                            ->schema([
                                FileUpload::make('featured_image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('posts'),

                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->required()
                                    ->default(fn() => auth()->id()),

                                Select::make('categories')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->preload(),

                                Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->preload(),

                                Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(false),

                                DateTimePicker::make('published_at'),
                            ]),

                        Section::make('SEO Config')
                            ->columnSpanFull()
                            ->schema([
                                TextInput::make('meta_title')
                                    ->maxLength(255),

                                Textarea::make('meta_description')
                                    ->maxLength(65535),
                            ])
                            ->collapsed(),
                    ])
            ]);
    }
}
