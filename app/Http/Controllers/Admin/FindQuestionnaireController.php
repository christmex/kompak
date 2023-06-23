<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FindQuestionnaireController extends Controller
{
    //
    public function index(){
        return view('pages.find-questionnaire.index');
    }
}
