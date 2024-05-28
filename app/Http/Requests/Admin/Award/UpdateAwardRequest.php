<?php

namespace App\Http\Requests\Admin\Award;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAwardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'appreciator' => 'required|string|min:5|max:255',
            'category' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama penghargaan wajib diisi',
            'name.min' => 'Nama penghargaan minimal 5 kata',
            'name.max' => 'Nama penghargaan maksimal 255 kata',
            'appreciator.required' => 'Pemberi penghargaan wajib diisi',
            'appreciator.min' => 'Pemberi penghargaan minimal 5 kata',
            'appreciator.max' => 'Pemberi penghargaan maksimal 255 kata',
            'category.required' => 'Kategori penghargaan wajib diisi',
            'category.in' => 'Kategori penghargaan tidak ada di dalam daftar',
        ];
    }
}
