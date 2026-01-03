<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|max:2048',
            'payment_proof' => 'nullable|mimes:jpg,jpeg,png,pdf|max:4096',
        ];
    }
}
