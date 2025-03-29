<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;
use Filament\Infolists\Components\ImageEntry;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\View;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Image;
use Spatie\Image\Enums\ImageFormat;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class GalleryResource extends Resource
{   
    private static function saveResizedWebp($src, $newWidth, $path)
{
    $width = imagesx($src);
    $height = imagesy($src);
    $newHeight = intval(($newWidth / $width) * $height);

    $resized = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($resized, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    imagewebp($resized, $path, 80);
    imagedestroy($resized);
}
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
                ->relationship('tags', 'name')
                ->multiple()
                ->preload(),

             Forms\Components\Hidden::make('slider_image'),
             Forms\Components\Hidden::make('detail_image'),
            SpatieMediaLibraryFileUpload::make('image')
                ->label('Obrázek')
                ->image()
                ->collection('gallery')
                ->conversion('media-webp') // nebo 'slider', 'detail'
                ->responsiveImages()
                ->required()
]);
}

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
               SpatieMediaLibraryImageColumn::make('image')
                ->label('Obrázek')
                ->collection('gallery'),
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
