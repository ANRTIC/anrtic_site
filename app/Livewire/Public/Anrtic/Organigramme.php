<?php

namespace App\Livewire\Public\Anrtic;

use Livewire\Component;
use App\Models\Page;

class Organigramme extends Component
{
    public ?Page $page = null;
    private string $code = 'organigramme';

    public function mount()
    {
        $this->page = Page::where("code", $this->code)->first();
    }

    public function render()
    {
        return view('livewire.public.anrtic.organigramme')
            ->extends("livewire.layouts.user");
    }
}
