<?php

namespace App\Http\Requests\Admin\Agenda;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class StoreAgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Store slug based input title.
     *
     * 
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->input('title')),
        ]);
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
            'slug' => 'min:5',
            'category' => 'required|in:1,2,3,4',
            'type' => 'required|in:1,2',
            'place' => 'required|min:5|max:255',
            'date' => 'required|date',
            'time' => 'required|min:5|max:255',
        ];
    }
}
