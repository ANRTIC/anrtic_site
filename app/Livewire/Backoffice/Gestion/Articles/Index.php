<?php

namespace App\Livewire\Backoffice\Gestion\Articles;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

#[Layout('livewire.layouts.backoffice')] 
class Index extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 6;
    public $selected;

    public function selectPost(Article $article)
    {
        $this->selected = $article;
    }

    public function deletePost()
    {
        if ($this->selected) {
            Storage::delete($this->selected->thumbnail);
            $this->selected->delete();
            
            return $this->redirect(route("backoffice.articles"), navigate: true);
        }
        
        return;
    }

    public function render()
    {
        $articles = $this->search ?
                Article::where('title', 'like', '%'. $this->search .'%')
                    ->orWhere('short_description', 'like', '%'. $this->search .'%')->paginate($this->perPage)
                : Article::paginate($this->perPage);

        return view('livewire.backoffice.gestion.articles.index', [
            "articles" => $articles
        ]);
    }
}
