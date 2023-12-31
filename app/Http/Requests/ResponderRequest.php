<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'user_id' => 'integer|in:'.backpack_user()->id,
            // lakukan pengecekan apakah user_id yang dikirim sama dengan user_id yang ada di tabel responder?
            'user_id' => 'integer',
            'questionnaire_id' => 'required',
            'responder_request_type_id' => 'required',
            'responder_proof' => 'sometimes|required_if:responder_request_type_id,3',
            'responder_description_feedback' => 'required_if:responder_request_type_id,4',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
