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
use Filament\Infolists\Components\ImageEntry;

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
                ->relationship('tags', 'name')
                ->multiple()
                ->preload(),

    Forms\Components\FileUpload::make('file_name')
    ->label('Image')
    ->image()
    ->directory('gallery')
    ->disk('public')
    ->required()
    ->getUploadedFileNameForStorageUsing(fn ($file) => Str::random(20) . '.' . $file->getClientOriginalExtension()) // Generuje náhodný název souboru
    ->afterStateUpdated(function ($state, $set, $get) {
        if ($state) {
            $filePath = storage_path("app/public/gallery/{$state}");
            if (file_exists($filePath)) {
                $set('file_size', filesize($filePath));
            }
        }
    }),   
]);
}



    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('file_name')
                     ->label('Image')
                    ->disk('public')
                    ->state(fn (Gallery $record): ?string => $record->file_name ? asset("storage/gallery/{$record->file_name}") : null),
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
