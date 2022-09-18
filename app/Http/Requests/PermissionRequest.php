<?php

namespace App\Http\Requests;

class PermissionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string'],
            'code' => ['required','string','unique:permissions,code'],
        ];
    }
}
