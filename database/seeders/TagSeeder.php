<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Gallery;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['Příroda', 'Město', 'Umění', 'Portrét', 'Černobílá'];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }

        // Přiřazení tagů k obrázkům
        $images = Gallery::all();
        $allTags = Tag::all();

        foreach ($images as $image) {
            $image->tags()->attach($allTags->random(rand(1, 3))->pluck('id'));
        }
    }
}
