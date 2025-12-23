<?php

namespace App\Livewire\Public\Anrtic;

use Livewire\Component;
use App\Models\Page;

class Missions extends Component
{
    public ?Page $page = null;
    private string $code = 'missions';
    
    public function mount()
    {
        $this->page = Page::where("code", $this->code)->first();
    }

    public function render()
    {
        return view('livewire.public.anrtic.missions')
            ->extends("livewire.layouts.user");
    }
}
