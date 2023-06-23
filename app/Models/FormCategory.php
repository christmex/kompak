<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormCategory extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'form_category_name',
        'parent_id'
    ];

    public function setFormCategoryNameAttribute($value)
    {
        $this->attributes['form_category_name'] = ucwords($value);
    }

    public function Formcategory()
    {
        return $this->belongsTo('App\Models\Formcategory', 'parent_id');
    }

    public function parent(){
        return $this->Formcategory();
    }

    public function children()
    {
        return $this->hasMany('App\Models\Formcategory', 'parent_id')->orderBy('lft');
    }
}
