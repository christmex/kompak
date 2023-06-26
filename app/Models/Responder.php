<?php

namespace App\Models;

// use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responder extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'questionnaire_id',
        'responder_request_type_id',
        'responder_proof',
        'responder_description',
        'responder_description_feedback',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function Questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire', 'questionnaire_id');
    }

    public function ResponderRequestType()
    {
        return $this->belongsTo('App\Models\ResponderRequestType', 'responder_request_type_id');
    }

    /**
     * Scope a query to only include active users.
     */
    // public function scopeUserQuestionnaireResponder(Builder $query): void
    // {
    //     $ids = Questionnaire::where('user_id',backpack_user()->id)->get()->pluck('id')->toArray();
    //     $query->whereIn('questionnaire_id', $ids);
    // }
}
