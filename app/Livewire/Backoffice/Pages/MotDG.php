<?php

namespace App\Livewire\Backoffice\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Page;

#[Layout('livewire.layouts.backoffice')]
class MotDG extends Component
{
    private $code = "mot-dg";
    public $title;
    public $content;

    public function save()
    {
        $validatedData = $this->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Le titre est obligatoire',
        ]);

        // En cas d'échec de validation, on émet un événement pour réinitialiser Froala
        if ($this->errors->count() > 0) {
            $this->emit('resetFroalaEditor');
        }

        dd($validatedData);

        /*Page::updateOrCreate(
            ["code" => $this->code],
            $validatedData
        );

        return $this->redirect(route("backoffice.motDG"), navigate: true); */
    }

    public function render()
    {
        return view('livewire.backoffice.pages.mot-d-g');
    }
}
