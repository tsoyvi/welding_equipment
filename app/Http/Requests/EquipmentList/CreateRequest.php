<?php

namespace App\Http\Requests\EquipmentList;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'order_id' => [''],
            'code_so' => [''],
            'welding_method' => [''],
            'otu' => [''],
            'type_att' => [''],
            'manufacturer' => [''],
            'model' => [''],
            'responsible' => [''],
            'cert' => [''],
            'so' => [''],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute'
        ];
    }

    public function attributes()
    {
        return [
            //'cert_number' => 'Номер сертификата',
        ];
    }
}
