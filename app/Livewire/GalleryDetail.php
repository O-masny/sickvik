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
    public $filterOpen = false;

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
    public function toggleFilter()
    {
        $this->filterOpen = !$this->filterOpen;
    }
    public function render()
    {
        $artworks = Gallery::query()
            ->when($this->search, function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->tag, function ($q) {
                $q->whereHas('tags', function ($q2) {
                    $q2->where('tags.id', $this->tag);
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(8);

        return view('livewire.gallery-detail', [
            'artworks' => $artworks,
            'tags' => $this->tags,
        ]);
    }

    public function loadMore()
    {
        $this->emit('loadMore');
    }
}
