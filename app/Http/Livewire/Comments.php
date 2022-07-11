<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $body;

    public function mount($comments)
    {
        $this->comments = $comments;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'body' => 'required|min:6',
        ]);
    }


    public function addComment()
    {

        $validatedData = $this->validate([
            'body' => 'required|min:6',
        ]);
        $validatedData['user_id'] = 1;

        $createdComments = Comment::create($validatedData);
        $this->comments->push($createdComments);

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.comments', [
            "comments" => $this->comments
        ]);
    }
}
