<?php

namespace App\Http\Requests;

use App\Enums\WaterSector;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ReflectionClass;

class WaterRecordRequest extends FormRequest
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
            "sector" => ["required", Rule::in(array_values((new ReflectionClass(WaterSector::class))->getConstants())),],
            "volume" => "required|numeric",
        ];
    }
}
