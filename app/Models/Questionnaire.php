<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'form_category_id',
        'user_id',
        'questionnaire_title',
        'questionnaire_description',
        'questionnaire_target',
        'questionnaire_embed_link',
        'is_active'
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function FormCategory()
    {
        return $this->belongsTo('App\Models\FormCategory', 'form_category_id');
    }
}
