<?php

namespace App\Http\Requests\Admin\Leader;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaderRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'contact' => 'required|min:5|max:255',
            'position' => 'required|in:1,2,3',
            'lhkpn' => 'required|mimes:pdf|max:10000',
            'photo' => 'required|mimes:jpeg,jpg,png|max:10000',
            'profile' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul dokumen wajib diisi',
            'name.min' => 'Judul dokumen minimal 5 kata',
            'name.max' => 'Judul dokumen maksimal 255 kata',
            'contact.required' => 'Judul dokumen wajib diisi',
            'contact.min' => 'Judul dokumen minimal 5 kata',
            'contact.max' => 'Judul dokumen maksimal 255 kata',
            'position.required' => 'Status peraturan wajib diisi',
            'position.in' => 'Status peraturan tidak ada di dalam daftar',
            'lhkpn.required' => 'LHKPN wajib diupload',
            'lhkpn.mimes' => 'Dokumen hanya bisa .pdf',
            'lhkpn.max' => 'Ukuran maksimal 10 MB',
            'photo.required' => 'Foto wajib diupload',
            'photo.mimes' => 'Foto hanya bisa .png, .jpeg atau .jpg',
            'photo.max' => 'Ukuran maksimal 10 MB',
            'profile.required' => 'Profil pimpinan wajib diisi',
        ];
    }
}
