<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'url' => 'required|string|url|min:5|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:20000',
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'URL wajib diisi',
            'url.min' => 'URL minimal 5 kata',
            'url.max' => 'URL maksimal 255 kata',
            'url.url' => 'URL tidak valid',
            'file.required' => 'File wajib diupload',
            'file.image' => 'File yang anda upload bukan gambar',
            'file.mimes' => 'File yang diupload harus dengan extensi .jpg, .jpeg, .png',
            'file.max' => 'File yang diupload maksimal 20 MB',
        ];
    }
}
