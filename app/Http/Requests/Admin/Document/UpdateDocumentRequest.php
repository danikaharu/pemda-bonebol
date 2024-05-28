<?php

namespace App\Http\Requests\Admin\Document;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'category' => 'required|in:keuangan,peraturan,perencanaan,pertanggungjawaban,sakip',
            'file' => 'sometimes|required|max:15000',
            'published_at' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul dokumen wajib diisi',
            'title.min' => 'Judul dokumen minimal 5 kata',
            'title.max' => 'Judul dokumen maksimal 255 kata',
            'published_at.required' => 'Tanggal Posting wajib diisi',
            'published_at.date' => 'Tanggal Posting tidak valid',
            'file.required' => 'File wajib diupload',
            'file.mimetypes' => 'File yang diupload harus dengan extensi .pdf',
            'file.max' => 'File yang diupload maksimal 15 MB',
            'category.required' => 'Status peraturan wajib diisi',
            'category.in' => 'Status peraturan tidak ada di dalam daftar',
        ];
    }
}
