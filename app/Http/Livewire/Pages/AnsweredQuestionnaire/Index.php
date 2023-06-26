<?php

namespace App\Http\Livewire\Pages\AnsweredQuestionnaire;

use Livewire\Component;
use App\Models\Responder;
use Livewire\WithPagination;
use App\Models\ResponderRequestType;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pagination = 10;

    public $formResponderRequestType;
    public $modelResponderRequestType;

    public function mount(){
        $this->modelResponderRequestType = ResponderRequestType::all();
    }
    public function render()
    {
        if(!empty($this->formResponderRequestType)){
            $modelResponder = Responder::with('Questionnaire','Questionnaire.User')->where('user_id', backpack_user()->id)->where('responder_request_type_id',$this->formResponderRequestType)->paginate($this->pagination);
            $modelResponderCount = Responder::with('Questionnaire','Questionnaire.User')->where('user_id', backpack_user()->id)->get()->count();
        }else {
            $modelResponder = Responder::with('Questionnaire','Questionnaire.User')->where('user_id', backpack_user()->id)->paginate($this->pagination);
            $modelResponderCount = Responder::with('Questionnaire','Questionnaire.User')->where('user_id', backpack_user()->id)->get()->count();
        }

        return view('livewire.pages.answered-questionnaire.index',compact('modelResponder','modelResponderCount'));
    }
}
