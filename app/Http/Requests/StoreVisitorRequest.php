<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVisitorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'gender_id' => ['required', Rule::exists('jenis_kelamin', 'id')],
            'job_id' => ['required', Rule::exists('master_pekerjaan', 'id')],
            'education_level_id' => ['required', Rule::exists('master_pendidikan', 'id')],
            'address' => ['required', 'string', 'max:1000'],
        ];
    }
}
