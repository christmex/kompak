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
            'name'      => 'responder_proof', // The db column name
            'label'     => 'Responder Proof', // Table column heading
            'type'      => 'image',
            'disk'   => 'public', 
            'height' => '130px',
            'width'  => '130px',
        ]);
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
            'tab' => 'Responder',
        ]);
        CRUD::addField([
            'type' => 'select',
            'label' => 'ResponderRequestType',
            'name' => 'responder_request_type_id', // the relationship name in your Migration
            'entity' => 'ResponderRequestType', // the relationship name in your Model
            'attribute' => 'responder_request_type_name',
            'allows_null' => false,
            'tab' => 'Responder',
        ]);
        CRUD::field('responder_proof')
            ->type('upload')
            ->tab('Responder')
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => 'responder-proof', // the path inside the disk where file will be stored
        ]);
        CRUD::field('responder_description')->tab('Responder');
        CRUD::field('responder_description_feedback')->tab('Feedback');

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
        $currentEntry = CRUD::getCurrentEntry();
        // if(backpack_user()->id != $currentEntry->questionnaire->user_id){
            // This if for the responder
            if(backpack_user()->id == $currentEntry->user_id){
                CRUD::setHeading('Selesaikan Kuisioner');
                CRUD::setSubheading('');
                CRUD::addField([
                    'name' => 'owner_name',
                    'label' => 'Nama Pemilik Kuisioner',
                    'attributes' => [
                        'disabled'    => 'disabled',
                    ],
                    'tab' => 'Responder',
                    'default' => $currentEntry->questionnaire->user->name
                ])->beforeField('questionnaire_id');;
                CRUD::modifyField('questionnaire_id',[
                    'type' => 'select',
                    'label' => 'Questionnaire',
                    'name' => 'questionnaire_id', // the relationship name in your Migration
                    'entity' => 'Questionnaire', // the relationship name in your Model
                    'attribute' => 'questionnaire_title',
                    'allows_null' => false,
                    'options' => function($query) use($currentEntry){
                        return $query->where('id',$currentEntry->questionnaire_id)->get();
                    }
                ]);
                CRUD::modifyField('responder_request_type_id',[
                    'type' => 'select',
                    'label' => 'ResponderRequestType',
                    'name' => 'responder_request_type_id', // the relationship name in your Migration
                    'entity' => 'ResponderRequestType', // the relationship name in your Model
                    'attribute' => 'responder_request_type_name',
                    'allows_null' => false,
                    'options' => function($query){
                        return $query->where('id',2)->get();
                    }
                ]);
                if(!$currentEntry->responder_description_feedback){
                    CRUD::removeField('responder_description_feedback');
                }else {
                    CRUD::modifyField('responder_description_feedback',[
                        'name' => 'responder_description_feedback',
                        'attributes' => ['disabled' => 'disabled'],
                    ]);
                }
            }

            // This if for the kuisioner owner
            if(backpack_user()->id == $currentEntry->questionnaire->user_id){
                CRUD::setHeading('Tinjau Kuisioner');
                CRUD::setSubheading('');
                CRUD::addField([
                    'name' => 'responder_name',
                    'label' => 'Nama Responder',
                    'attributes' => [
                        'disabled'    => 'disabled',
                    ],
                    'tab' => 'Responder',
                    'default' => $currentEntry->user->name
                ])->beforeField('questionnaire_id');;
                CRUD::modifyField('user_id',[
                    'type' => 'hidden',
                    'default' => $currentEntry->user_id,
                ]);
                CRUD::modifyField('responder_request_type_id',[
                    'type' => 'select',
                    'label' => 'ResponderRequestType',
                    'name' => 'responder_request_type_id', // the relationship name in your Migration
                    'entity' => 'ResponderRequestType', // the relationship name in your Model
                    'attribute' => 'responder_request_type_name',
                    'allows_null' => false,
                    'options' => function($query){
                        return $query->whereIn('id',[3,4])->get();
                    }
                ]);

                CRUD::modifyField('responder_description',[
                    'name' => 'responder_description',
                    'attributes' => ['disabled' => 'disabled']
                ]);
            }
        // }
        

        
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    
}
