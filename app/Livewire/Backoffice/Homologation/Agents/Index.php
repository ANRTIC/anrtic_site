<?php

namespace App\Livewire\Backoffice\Homologation\Agents;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 8;
    public $selected;

    public function selectAgentAccount()
    {

    }

    public function suspendAgentAccount()
    {

    }

    public function deleteAgentAccount()
    {

    }

    public function render()
    {
        $agents = User::role('AGENT');

        if ($this->search) {
            $agents = $agents->where(function($query) {
                $query->where('first_name', 'like', '%'. $this->search .'%')
                      ->orWhere('last_name', 'like', '%'. $this->search .'%')
                      ->orWhere('email', 'like', '%'. $this->search .'%')
                      ->orWhere('phone', 'like', '%'. $this->search .'%');
            });

            $agents = $agents->paginate($this->perPage);
        } else {
            $agents = $agents->get();
        }
        return view('livewire.backoffice.homologation.agents.index', [
            "agents" => $agents
        ])->extends("livewire.layouts.backoffice");
    }
}
