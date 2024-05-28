<?php

namespace App\Http\Requests\Admin\Agency;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyRequest extends FormRequest
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
            'category' => 'required|in:1,2,3',
            'name' => 'required|string|min:5|max:255',
            'head_office' => 'required|string|min:5|max:255',
            'url' => 'nullable|string|url|min:5|max:255',
            'email' => 'nullable|string|email|min:5|max:255',
            'address' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Kategori wajib diisi',
            'category.in' => 'Kategori tidak ada di dalam daftar',
            'name.required' => 'Nama SKPD wajib diisi',
            'name.min' => 'Nama SKPD minimal 5 kata',
            'name.max' => 'Nama SKPD maksimal 255 kata',
            'head_office.required' => 'Nama Pimpinan wajib diisi',
            'head_office.min' => 'Nama Pimpinan minimal 5 kata',
            'head_office.max' => 'Nama Pimpinan maksimal 255 kata',
            'url.min' => 'Alamat Website minimal 5 kata',
            'url.max' => 'Alamat Website maksimal 255 kata',
            'url.url' => 'Alamat Website tidak valid',
            'email.min' => 'Email SKPD minimal 5 kata',
            'email.max' => 'Email SKPD maksimal 255 kata',
            'email.email' => 'Email SKPD tidak valid',
            'address.required' => 'Alamat Kantor wajib diisi',
        ];
    }
}
