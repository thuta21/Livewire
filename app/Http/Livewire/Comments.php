<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function mount($InitialComments)
    {
        $this->comments = $InitialComments;
    }

    public function addComment()
    {
        if($this->newComment == '')
        {
            return ;
        }
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Thuta'
        ]);

        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments', [
            "comments" => $this->comments
        ]);
    }
}
