<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $body;

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
        session()->flash('message', 'Post successfully updated.');


        $this->body = '';
    }

    public function remove($commentID)
    {
        $comment = Comment::findOrFail($commentID);
        $comment->delete();
    }

    public function render()
    {
        return view('livewire.comments', [
            "comments" => Comment::paginate(2),
        ]);
    }
}
