<?php

namespace App\Http\Controllers\Admin;

use App\Models\Responder;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Http\Controllers\Controller;

class AnsweredQuestionnaireController extends Controller
{
    public function index(){
        return view('pages.answered-questionnaire.index');
    }

    public function answer(Questionnaire $questionnaire){

        // insert to responder table
        if(($questionnaire->questionnaire_target - $questionnaire->countAllAcceptedResponder() > 0)){
            Responder::firstOrcreate(
                [
                    'user_id' => backpack_user()->id,
                    'questionnaire_id' => $questionnaire->id
                ],
                ['responder_request_type_id' => 1]
            );
        }
        
        return redirect()->route('answered-questionnaire.index');
        // dd($questionnaire->questionnaire_embed_link);
        // return view('pages.questionnaire.answer',compact('questionnaire','insertResponder'));
    }
}
