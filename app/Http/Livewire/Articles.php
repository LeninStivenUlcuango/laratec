<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    
    // public $articles;
    // public function mount(){
    //     $this->articles = \App\Models\Article::all();
    // }
    public $title;
    public $content;

    public function render()
    {
        return view('livewire.articles', ['articles' => \App\Models\Article::all()]);
    }

    public function nuevoArticulo(){
        $data=[
            'title'=>$this->title,
            'content'=>$this->content
        ];
        Article::create($data);
    }
}
