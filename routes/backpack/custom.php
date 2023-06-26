<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('form-category', 'FormCategoryCrudController');
    Route::crud('questionnaire', 'QuestionnaireCrudController');
    // Route::get('questionnaire/{questionnaire}/answer', 'QuestionnaireController@answer')->name('questionnaire.answer');
    Route::get('find-questionnaire', 'FindQuestionnaireController@index')->name('find-questionnaire.index');
    Route::get('answered-questionnaire', 'AnsweredQuestionnaireController@index')->name('answered-questionnaire.index');
    Route::get('answered-questionnaire/{questionnaire}', 'AnsweredQuestionnaireController@answer')->name('answered-questionnaire.answer');
    Route::crud('responder-request-type', 'ResponderRequestTypeCrudController');
    Route::crud('responder', 'ResponderCrudController');
}); // this should be the absolute last line of this file