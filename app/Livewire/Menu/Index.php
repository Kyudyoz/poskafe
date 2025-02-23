<?php

namespace App\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public $search;
    protected $listeners = ['reload' => '$refresh'];
    public function render()
    {
        return view('livewire.menu.index', [
            'menus' => Menu::when(
                $this->search,
                fn($query) => $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%')
                    ->orWhere('desc', 'like', '%' . $this->search . '%')
            )->get(),
        ]);
    }
}
