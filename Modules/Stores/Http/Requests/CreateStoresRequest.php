<?php

namespace Modules\Stores\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateStoresRequest extends BaseFormRequest
{
    public function rules()
    {
        return ['city_id'=> 'required',
'area_id'=> 'required',
'gaurage_name'=> 'required',
'address'=> 'required',
'lat'=> 'required',
'longi'=> 'required',
'videos13'=> 'required',
'videos14'=> 'required',
'videos15'=> 'required',
'phone_number'=> 'required',
'aphone_number'=> 'required',
'first_name'=> 'required',
'last_name'=> 'required',
'email'=> 'required|unique:users|email',
'password'=> 'required'];
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
