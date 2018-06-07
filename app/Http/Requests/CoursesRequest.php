<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CoursesRequest extends FormRequest
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
            'titlle' => 'required|max:255|unique:courses,titlle,' . request()->input('id'),
            'price' => 'required',
            'teacher_id' => 'required',
            'date_plan' => 'required',
            'max_person' => 'required',
            'min_person' => 'required',
            'time_start' => 'required',
            'start_time' => 'required',
            'status' => 'required',
        ];
    }
}
