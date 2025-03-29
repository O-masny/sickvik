<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// Spatie Media Library
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $attributes = [
        'views' => 0,
    ];

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'gallery_tag');
    }

    /**
     * Media Collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery') // kolekce pro obrázky
            ->singleFile(); // vždy jen jeden obrázek
    }

    /**
     * Media Conversions
     */
  public function registerMediaConversions(Media $media = null): void
{
    $this->addMediaConversion('media-webp')
        ->format('webp')
        ->nonQueued();

    $this->addMediaConversion('slider')
        ->format('webp')
        ->width(500)
        ->nonQueued();

    $this->addMediaConversion('detail')
        ->format('webp')
        ->width(1200)
        ->nonQueued();
}
}
