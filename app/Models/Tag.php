<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function images()
    {
        return $this->belongsToMany(Gallery::class);
    }
}
