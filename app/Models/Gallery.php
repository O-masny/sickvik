<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',

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
}
