<?php

namespace App\Http\Controllers\Admin;

use App\Models\Questionnaire;
use App\Http\Requests\ResponderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ResponderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ResponderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Responder::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/responder');
        CRUD::setEntityNameStrings('responder', 'responders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $getAllQuestionnaire = Questionnaire::where('user_id',backpack_user()->id)->get()->pluck('id')->toArray();
        CRUD::addClause('whereIn', 'questionnaire_id', $getAllQuestionnaire);
        CRUD::addColumn([
            "name" => "questionnaire_id",
            "label" => "Questionnaire",
            "entity" => "Questionnaire",
            "model" => "App\Models\Questionnaire",
            "type" => "select",
            "attribute" => "questionnaire_title"
        ]);
        CRUD::addColumn([
            "name" => "user_id",
            "label" => "Responder By",
            "entity" => "User",
            "model" => "App\Models\User",
            "type" => "select",
            "attribute" => "name"
        ]);
        CRUD::addColumn([
            "name" => "responder_request_type_id",
            "label" => "ResponderRequestType",
            "entity" => "ResponderRequestType",
            "model" => "App\Models\ResponderRequestType",
            "type" => "select",
            "attribute" => "responder_request_type_name"
        ]);
        CRUD::addColumn([
            'name'      => 'responder_proof', // The db column name
            'label'     => 'Responder Proof', // Table column heading
            'type'      => 'image',
            'disk'   => 'public', 
            'height' => '130px',
            'width'  => '130px',
        ]);
        CRUD::column('responder_description');
        CRUD::column('responder_description_feedback');

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
        CRUD::setValidation(ResponderRequest::class);

        CRUD::field('user_id')->type('hidden')->default(backpack_user()->id);
        CRUD::addField([
            'type' => 'select',
            'label' => 'Questionnaire',
            'name' => 'questionnaire_id', // the relationship name in your Migration
            'entity' => 'Questionnaire', // the relationship name in your Model
            'attribute' => 'questionnaire_title',
            'allows_null' => false,
        ]);
        CRUD::addField([
            'type' => 'select',
            'label' => 'ResponderRequestType',
            'name' => 'responder_request_type_id', // the relationship name in your Migration
            'entity' => 'ResponderRequestType', // the relationship name in your Model
            'attribute' => 'responder_request_type_name',
            'allows_null' => false,
        ]);
        CRUD::field('responder_proof')
            ->type('upload')
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => 'responder-proof', // the path inside the disk where file will be stored
        ]);
        CRUD::field('responder_description');
        CRUD::field('responder_description_feedback');

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

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    
}
