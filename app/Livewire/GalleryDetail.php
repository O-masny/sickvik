<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gallery;
use App\Models\Tag;

class GalleryDetail extends Component
{
    use WithPagination;

    public $search = '';
    public $tag = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $tags = [];

    protected $queryString = ['search', 'tag', 'sortBy', 'sortDirection'];

    public function mount()
    {
        $this->tags = Tag::all(); // Načteme všechny tagy
    }

    public function updated($property)
    {
        if (in_array($property, ['search', 'tag', 'sortBy'])) {
            $this->resetPage(); // Resetuje stránkování při změně filtru
        }
    }

    public function render()
    {        
        $query = Gallery::query();

        if (!empty($this->search)) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

     if (!empty($this->tag)) {
        $query->whereHas('tags', function ($q) {
            $q->where('tags.id', $this->tag); // ⚠️ Explicitně určujeme tabulku "tags"
        });
    }

        $artworks = $query->orderBy($this->sortBy, 'desc')
                          ->paginate(8);

        return view('livewire.gallery-detail', [
            'artworks' => $artworks,
            'tags' => $this->tags
        ]);
    }

    public function loadMore()
    {
        $this->emit('loadMore');
    }
}
