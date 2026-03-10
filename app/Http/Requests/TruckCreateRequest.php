<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dispatcher_id'=> 'required|exists:dispatchers,id',
            'truck_number'=> 'required|max:50',
            'driver_name'=>'required|max:100',
            'driver_phone'=>'required|max:20',
            'equipment_type' => 'required|in:dry_van,flatbed,reefer,step_deck',
            'max_weight' => 'required|integer',
            'available_from' => 'required|date',
            'current_location' => 'required|max:225',
            // 'accessories' => 'nullable|array',
            // 'accessories.*' => 'exists:accessory,id',

        ];
    }
}
