<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|integer|exists:categories,id',            
            'main_image' => 'nullable|file|image|max:10240',
            'preview_image' => 'nullable|file|image|max:10240',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'main_image.image' => 'The main image must be an image file.',
            'preview_image.image' => 'The preview image must be an image file.',
            'tag_ids.array' => 'The tag IDs must be an array.',
            'tag_ids.*.exists' => 'One or more selected tags do not exist.',
        ];
    }
}
