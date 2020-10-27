<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class Builds extends Component
{
    use WithPagination;

    public $buildsRaw = [];
    public $buildsLinks;
    public $builds;

    protected $listeners = ['buildsUpdated' => 'refreshBuildsPagination'];

    public function mount()
    {
        $this->refreshBuildsPagination();
    }

    public function refreshBuildsPagination()
    {
        $perPage = 5;
        $page = LengthAwarePaginator::resolveCurrentPage();
        $builds = collect($this->buildsRaw);

        $this->builds = $builds->forPage($page, $perPage);

        $this->buildsLinks = (new LengthAwarePaginator($this->builds, $builds->count(), $perPage, $page, [
            'path' => '/builds/',
            'pageName' => 'page',
        ]))->links()->render();
    }

    public function setPage($page)
    {
        $this->page = $page;
        $this->refreshBuildsPagination();
    }

    public function render()
    {
        return view('livewire.builds');
    }
}
