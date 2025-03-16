<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // ✅ SPRÁVNÝ IMPORT

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file_name', 'file_size', 'file_format', 'width', 'height', 'image_path'];
   
   public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'gallery_tag');
    }
}