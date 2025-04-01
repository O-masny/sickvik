<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Media';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                TextArea::make('description')
                    ->label('Description')
                    ->nullable()
                    ->maxLength(1000),

                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload(),

                Forms\Components\Hidden::make('slider_image'),
                Forms\Components\Hidden::make('detail_image'),

                FileUpload::make('image')
                    ->label('Obrázek')
                    ->image()
                   ->required()

                    ->directory('uploads')
                    ->preserveFilenames(false)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])
                    ->visibility('public'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                   Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->label('Obrázek')
                    ->height(120),

                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('tags.name')
                    ->label('Tagy')
                    ->separator(', '),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),
            ])
            ->filters([
                // --
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

    /**
     * Konverze nahraného obrázku do .webp
     */
 protected function mutateFormDataBeforeCreate(array $data): array
{
    Log::info('📥 [mutateFormDataBeforeCreate] Spuštěna konverze obrázku');

    if (!isset($data['image'])) {
        Log::warning('⚠️ [mutateFormDataBeforeCreate] Pole image není nastavené.');
        return $data;
    }

    $originalPath = storage_path('app/public/' . $data['image']);
    Log::info('📄 Původní obrázek:', [
        'relativní cesta' => $data['image'],
        'absolutní cesta' => $originalPath,
    ]);

    if (!file_exists($originalPath)) {
        Log::warning("❗ Soubor neexistuje: $originalPath");
        return $data;
    }

    try {
        $filename = Str::slug(pathinfo($originalPath, PATHINFO_FILENAME)) . '-' . time() . '.webp';

        $webpRelativePath = 'uploads/' . $filename;
        $webpFullPath = storage_path('app/public/' . $webpRelativePath);

        Log::info('🛠️ [Konverze] Převádím do WebP:', [
            'výstupní relativní cesta' => $webpRelativePath,
            'výstupní absolutní cesta' => $webpFullPath,
        ]);

        $manager = new ImageManager(new GdDriver());
        $image = $manager->read($originalPath);

        Log::info('🔁 [Konverze] Čtení obrázku OK, ukládám jako WebP...');

        $image->toWebp(90)->save($webpFullPath);

        Log::info('✅ [Hotovo] Uloženo jako WebP.');

        // Smazání původního obrázku
        unlink($originalPath);
        Log::info("🧹 [Smazání] Odstraněn původní soubor: $originalPath");

        $data['image'] = $webpRelativePath;

    } catch (\Throwable $e) {
        Log::error('❌ [Chyba] WebP konverze selhala: ' . $e->getMessage());
    }

    return $data;
}

}
