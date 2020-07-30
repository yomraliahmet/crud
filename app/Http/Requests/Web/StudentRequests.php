<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequests extends FormRequest
{
    public function rules()
    {
        return [
            'name'    => 'required',
            'gender' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'is_active' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name'    => trans('models.students.name'),
            'gender' => trans('models.students.gender'),
            'image' => trans('models.students.image'),
            'is_active' => trans('models.students.is_active'),
        ];
    }
}
