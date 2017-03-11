<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
          'description' => 'required',
          'img' => 'required|image',
        ];
    }

    public function messages() {
      return [
        'description.required' => ':attribute 는/은 필수입니다.',
        'img.required' => ':attribute 를 첨부해주세요.',
        'image' => ':attribute 는/은 이미지 파일이여야 합니다.',
      ];
    }

    public function attributes() {
      return [
        'description' => '설명',
        'img' => '이미지',
      ];
    }
}
