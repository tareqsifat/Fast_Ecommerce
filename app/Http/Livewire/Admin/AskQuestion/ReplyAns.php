<?php

namespace App\Http\Livewire\Admin\AskQuestion;

use App\Models\AnsQuestion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReplyAns extends Component
{

    public $item;
    public $answer;
    protected $listeners = [
        'getModalId',
    ];
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $this->item = $item;
    }

    // delete into database 
    public function delete($id)
    {
        $delData = AnsQuestion::find($id);
        if ($delData) {
            AnsQuestion::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        }
    }

    public function save()
    {
        if (!is_null($this->item)) {
            $this->validate([
                'answer'   => 'required',
            ]);
            AnsQuestion::create([
                'answer' => $this->answer,
                'ask_question_id' => $this->item,
                'user_id' => Auth::user()->id,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->close();
    }

    public function close()
    {
        $this->answer = null;
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        return view('livewire.admin.ask-question.reply-ans', [
            'allreply' => AnsQuestion::where('ask_question_id', $this->item)->get(),
        ]);
    }
}
