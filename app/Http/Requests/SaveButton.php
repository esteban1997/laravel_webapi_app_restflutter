<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveButton extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'icon' => 'required',
            'color' => 'required',
            'color_bg' => 'required',
            'label' => 'required',
            'type' => 'required',
            'group_id' => 'required',
        ];
    }
}
