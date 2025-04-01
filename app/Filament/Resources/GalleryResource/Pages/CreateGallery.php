<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;
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

        unlink($originalPath);
        Log::info("🧹 [Smazání] Odstraněn původní soubor: $originalPath");

        $data['image'] = $webpRelativePath;
    } catch (\Throwable $e) {
        Log::error('❌ [Chyba] WebP konverze selhala: ' . $e->getMessage());
    }

    return $data;
}
}
