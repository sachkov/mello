<?php

namespace App\Http\Requests;

class UpdatePermissionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string'],
            'code' => ['string'],
        ];
    }
}
