<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;
   protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['image'])) {
            $path = "gallery/" . pathinfo($data['image'], PATHINFO_BASENAME);
            if (Storage::disk('public')->exists($path)) {
                $data['file_name'] = pathinfo($path, PATHINFO_BASENAME);
                $data['file_size'] = Storage::disk('public')->size($path);
                $data['file_format'] = pathinfo($path, PATHINFO_EXTENSION);
            }
        }

        return $data;
    }
}
