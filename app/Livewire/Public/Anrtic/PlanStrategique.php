<?php

namespace App\Livewire\Public\Anrtic;

use Livewire\Component;
use App\Models\Page;

class PlanStrategique extends Component
{
    public ?Page $page = null;
    private string $code = 'plan-strategique';
    
    public function mount()
    {
        $this->page = Page::where("code", $this->code)->first();
    }

    public function render()
    {
        return view('livewire.public.anrtic.plan-strategique')
            ->extends("livewire.layouts.user");
    }
}
