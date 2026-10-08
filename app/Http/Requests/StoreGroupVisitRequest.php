<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupVisitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $counts = [
            'male_total', 'female_total', 'civil_servant_total', 'private_employee_total',
            'researcher_total', 'teacher_total', 'lecturer_total', 'retiree_total',
            'military_total', 'entrepreneur_total', 'student_total', 'university_student_total',
            'other_job_total', 'elementary_total', 'junior_high_total', 'senior_high_total',
            'd1_total', 'd2_total', 'd3_total', 's1_total', 's2_total', 's3_total',
        ];

        $rules = [
            'leader_name' => ['required', 'string', 'max:255'],
            'leader_phone' => ['required', 'string', 'max:20'],
            'institution' => ['required', 'string', 'max:255'],
            'institution_address' => ['required', 'string', 'max:1000'],
            'institution_phone' => ['required', 'string', 'max:20'],
            'institution_email' => ['required', 'email', 'max:255'],
            'personnel_total' => ['required', 'integer', 'min:1', 'max:10000'],
        ];

        foreach ($counts as $field) {
            $rules[$field] = ['nullable', 'integer', 'min:0', 'max:10000'];
        }

        return $rules;
    }

    protected function prepareForValidation(): void
    {
        $countFields = array_filter(array_keys($this->rules()), fn (string $field) => str_ends_with($field, '_total'));

        $this->merge(collect($countFields)
            ->mapWithKeys(fn (string $field) => [$field => $this->input($field, 0)])
            ->all());
    }
}
