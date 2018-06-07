<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use ValidateOldPassword;
use Illuminate\Foundation\Http\FormRequest;


class ProfileRequest extends FormRequest
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
        if ( request()->input('checkbox') ) {
            return [
                'gender' => 'required|max:50',
                'email' => 'required|email|max:50|unique:users,email,' . request()->input('id'),
                'phone' => 'required',
                'password' => 'required|min:8|',
                'confirm_password' => 'required|min:8|same:password'
            ];
        } else {
            return [
                'name' => 'required|max:255|unique:users,name,' . request()->input('id'),
                'furigana_name' => 'required|max:50',
                'email' => 'required|email|max:50|unique:users,email,' . request()->input('id'),
                'phone' => 'required',
            ];
        }
    }

}
