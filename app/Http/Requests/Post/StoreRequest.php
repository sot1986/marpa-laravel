<?php

namespace App\Http\Requests\Post;

use App\Contracts\TestInterface;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest implements TestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Post::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    public function test(): void
    {
        echo 'Test da StoreRequest';
    }
}
