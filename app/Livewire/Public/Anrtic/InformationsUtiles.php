<?php

namespace App\Livewire\Public\Anrtic;

use Livewire\Component;
use App\Models\Page;

class InformationsUtiles extends Component
{
    public ?Page $page = null;
    private string $code = 'information-utile';

    public function mount()
    {
        $this->page = Page::where("code", $this->code)->first();
    }

    public function render()
    {
        return view('livewire.public.anrtic.informations-utiles')
            ->extends("livewire.layouts.user");
    }
}
