<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            //
            'first_name'    => 'required|alpha',
            'last_name'     => 'required|alpha',
            'contact_no'    => 'required|numeric',
            'curr_address'  => 'required',
            'role_id'       => 'required|exists:tbl_roles,id',
            'email'         => 'required|unique:tbl_users',
            'password'      => 'required',
            'cpassword'     => 'required|same:password'
        ];
    }
}
