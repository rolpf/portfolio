<?php

namespace Theme\Livewire;

use Corcel\Model\Post;
use Livewire\WithPagination;

class ProjectArchive extends \Livewire\Component
{
    use WithPagination;

    public string $filter = 'all';
    public array $query = [];
    public function mount() {
        global $wp_query;
        $this->query = $wp_query->query;
    }
    public function render() {

        $projects = Post::query()->type('projects')->orderBy('post_date', 'DESC')->status('publish');

        if ($this->filter !== 'all') {
            $projects->taxonomy('services', $this->filter);
        }

        return view('livewire.project-archive', [
            'projects' => $projects->paginate(6),
        ]);
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }
}