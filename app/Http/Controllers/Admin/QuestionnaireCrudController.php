<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Library\Widget;
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
        Widget::add([
            'type'         => 'alert',
            'class'        => 'alert alert-success mb-2',
            'heading'      => 'Horeee, Ini Adalah versi Beta Aplikasi Kompak 🙌',
            'content'      => 'Jika terdapat hal hal yang tidak seharusnya terjadi, atau anda membutuhkan bantuan, dapat mengirim report kepada kami <strong><a href='.route('report.index').'>disini</a></strong>, feedback anda sangat berarti untuk kami, terima kasih.',
            'close_button' => true, // show close button or not
        ]);
        CRUD::addClause('where', 'user_id', '=', backpack_user()->id);
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
        CRUD::column('questionnaire_embed_link');
        CRUD::column('is_active');

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

        // CRUD::field('form_category_id');
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
        CRUD::field('questionnaire_embed_link')->type('url')->hint('Contoh : Masukkan url kuisioner');
        CRUD::field('is_active')->default(true);

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
