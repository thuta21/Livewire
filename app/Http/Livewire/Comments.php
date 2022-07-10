<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function mount($comments)
    {
        $this->comments = $comments;
    }

    public function addComment()
    {
        if($this->newComment == '')
        {
            return ;
        }
        $createdComments = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);

        $this->comments->push($createdComments);

        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments', [
            "comments" => $this->comments
        ]);
    }
}
