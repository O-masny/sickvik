<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

protected static ?string $navigationIcon = 'heroicon-o-photo';  // Například 'photo'
    protected static ?string $navigationGroup = 'Media';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextArea::make('description')
                    ->label('Description')
                    ->nullable()
                    ->maxLength(1000),
                Select::make('tags')
                    ->relationship('tags', 'name') // Nastavení vztahu
                    ->multiple()
                    ->preload(),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('gallery') // Určuje složku pro ukládání souboru
                    ->maxSize(5120) // Maximální velikost souboru (5MB)
                    ->required()
                    ->helperText('Upload an image for the gallery')
                    ->disk('public')
                    ->columnSpan('full')
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Pokud je obrázek nahrán, automaticky vyplníme ostatní pole
                        if ($state) {
                            $file = $state; // Obrázek, který byl nahrán
                            $set('file_name', $file->getClientOriginalName());
                            $set('file_size', $file->getSize());
                            $set('file_format', $file->getClientOriginalExtension());
                        }
                    }),

                // Další pole pro file_name, file_size a file_format, která se vyplní automaticky
                Forms\Components\TextInput::make('file_name')
                    ->label('File Name')
                    ->disabled() // Pole bude automaticky vyplněno
                    ->default(fn ($get) => $get('image') ? $get('image')->getClientOriginalName() : null),

                Forms\Components\TextInput::make('file_size')
                    ->label('File Size')
                    ->disabled() // Pole bude automaticky vyplněno
                    ->default(fn ($get) => $get('image') ? $get('image')->getSize() : null),

                Forms\Components\TextInput::make('file_format')
                    ->label('File Format')
                    ->disabled() // Pole bude automaticky vyplněno
                    ->default(fn ($get) => $get('image') ? $get('image')->getClientOriginalExtension() : null),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->height(150)
                    ->width(150),
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tags.name')->label('Tagy')->separator(', '),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
