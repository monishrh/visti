<?php

namespace Modules\Vehiclem\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateBmodelRequest extends BaseFormRequest
{
    public function rules()
    {
        return ['brand_id'=> 'required',
'model_name'=> 'required',
'status'=> 'required',];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
