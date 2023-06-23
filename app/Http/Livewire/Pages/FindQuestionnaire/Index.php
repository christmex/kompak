<?php

namespace App\Http\Livewire\Pages\FindQuestionnaire;

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
    public $modelFormCategory;
    // public $modelQuestionnaire;

    public function mount(){
        // $this->modelQuestionnaire = Questionnaire::paginate(10);
        $this->modelFormCategory = FormCategory::all();
        // dd($this->modelQuestionnaire);
    }
    public function render()
    {
        if(!empty($this->formFormCategory)){
            $modelQuestionnaire = Questionnaire::with('User')->where('form_category_id',$this->formFormCategory)->paginate(1);
        }else {
            $modelQuestionnaire = Questionnaire::with('User')->paginate($this->pagination);
        }

        return view('livewire.pages.find-questionnaire.index',compact('modelQuestionnaire'));
    }
}
