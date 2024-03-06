<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class IndexTaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "per_page" => "nullable|integer",
            "page" => "nullable|integer",
            "status_id" => "nullable|integer|exists:statuses,id",
            "date_from" => "nullable|date",
            "date_to" => "nullable|date",
        ];
    }
}
