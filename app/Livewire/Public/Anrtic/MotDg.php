<?php

namespace App\Livewire\Public\Anrtic;

use Livewire\Component;
use App\Models\Page;

class MotDg extends Component
{
    public ?Page $page = null;
    private string $code = 'mot-dg';

    public function mount()
    {
        $this->page = Page::where('code', $this->code)->first();
    }

    public function render()
    {
        return view('livewire.public.anrtic.mot-dg')
            ->extends("livewire.layouts.user");
    }
}
