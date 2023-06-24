<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnsweredQuestionnaireController extends Controller
{
    public function index(){
        return view('pages.answered-questionnaire.index');
    }
}
