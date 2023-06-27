<?php

namespace App\Http\Livewire\Pages\FindQuestionnaire;

use App\Models\User;
use Livewire\Component;
use App\Models\FormCategory;
use Livewire\WithPagination;
use App\Models\Questionnaire;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pagination = 10;

    public $formFormCategory;
    public $formUser;
    public $modelFormCategory;
    public $modelUser;
    // public $modelQuestionnaire;

    public function mount(){
        // $this->modelQuestionnaire = Questionnaire::paginate(10);
        $this->modelFormCategory = FormCategory::all();
        if(request('user_id')){
            $this->formUser = request('user_id');
            $this->modelUser = User::where('email','!=','super@admin.com')->where('id',$this->formUser)->get();
        }else {
            $this->modelUser = User::where('email','!=','super@admin.com')->get();
        }
    }
    public function render()
    {
        
        if(!empty($this->formFormCategory)){
            $modelQuestionnaire = Questionnaire::with('User')->where('is_active', true)->where('form_category_id',$this->formFormCategory);
        }else {
            $modelQuestionnaire = Questionnaire::with('User')->where('is_active', true);
        }

        if(!empty($this->formUser)){
            $modelQuestionnaire = $modelQuestionnaire->where('user_id',$this->formUser);
        }

        $modelQuestionnaire = $modelQuestionnaire->paginate($this->pagination);

        return view('livewire.pages.find-questionnaire.index',compact('modelQuestionnaire'));
    }
}
