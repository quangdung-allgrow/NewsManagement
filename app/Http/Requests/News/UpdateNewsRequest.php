<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->request->get('id');

        return [
            'title' => 'required|min:10|max:500|unique:news,title,'. $id,
            'content' => 'required|min:100|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('validation.required', ['attribute' => 'Title']),
            'title.min' => __('validation.min.string', ['attribute' => 'Title', 'min' => 10]),
            'title.max' => __('validation.max.string', ['attribute' => 'Title', 'max' => 500]),
            'title.unique' => __('validation.unique', ['attribute' => 'Title']),
            'content.required' => __('validation.required', ['attribute' => 'Content']),
            'content.min' => __('validation.min.string', ['attribute' => 'Content', 'min' => 100]),
            'content.max' => __('validation.max.string', ['attribute' => 'Content', 'max' => 10000]),
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
