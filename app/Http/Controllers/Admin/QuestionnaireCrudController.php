<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionnaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class QuestionnaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QuestionnaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Questionnaire::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/questionnaire');
        CRUD::setEntityNameStrings('questionnaire', 'questionnaires');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            "name" => "form_category_id",
            "label" => "Form Category",
            "entity" => "FormCategory",
            "model" => "App\Models\FormCategory",
            "type" => "select",
            "attribute" => "form_category_name"
        ]);
        CRUD::addColumn([
            "name" => "user_id",
            "label" => "Created By",
            "entity" => "User",
            "model" => "App\Models\User",
            "type" => "select",
            "attribute" => "name"
        ]);
        // CRUD::column('user_id');
        CRUD::column('questionnaire_title');
        CRUD::column('questionnaire_description');
        CRUD::column('questionnaire_target');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(QuestionnaireRequest::class);

        CRUD::field('form_category_id');
        CRUD::addField([
            'type' => 'select',
            'label' => 'Form Category',
            'name' => 'form_category_id', // the relationship name in your Migration
            'entity' => 'FormCategory', // the relationship name in your Model
            'attribute' => 'form_category_name',
            'allows_null' => false,
        ]);
        CRUD::field('user_id')->type('hidden')->default(backpack_user()->id);
        CRUD::field('questionnaire_title');
        CRUD::field('questionnaire_description');
        CRUD::field('questionnaire_target')->type('number')->attributes(['min' => 1]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
