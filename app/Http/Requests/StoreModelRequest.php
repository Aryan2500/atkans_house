<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can add role-based checks here if needed
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:users,email',
            'dob' => 'required|date|before:today',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'instagram_link' => 'url|max:255',
            'height_cm' => 'required|numeric|min:100|max:250',
            'weight_kg' => 'required|numeric|min:30|max:200',
            'status' => 'required|in:pending,approved,rejected',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10048', // max 10MB
            'experience' => 'nullable|string',
            'biography' => 'nullable|string',
            'availability' => 'nullable|string',
        ];
    }

    /**
     * Custom messages (optional)
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already registered.',
            'dob.before' => 'Date of birth must be before today.',
            'photo.image' => 'Photo must be a valid image file.',
            'photo.max' => 'Photo size must not exceed 10MB.',
        ];
    }
}
