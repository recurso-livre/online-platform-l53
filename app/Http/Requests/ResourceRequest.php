<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Category;

class ResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // O Usuário só poderá fazer essa requisição se pelo menos 1 categoria existir
        return (Category::count() > 0);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"                  => "required|min:5|max:255",
            "technicalDescription"  => "required|min:5|max:1000",
            "informalDescription"   => "required|min:5|max:1000"
        ];
    }
}
