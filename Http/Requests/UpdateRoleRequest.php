<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (config('core.saas_enable')) {
            return [
                'name'       => "required|unique:tenant.roles,name," . $this->role,
                'permission' => 'required',
            ];
        }

        return [
            'name'       => 'required|unique:roles,name,' . $this->role,
            'permission' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
