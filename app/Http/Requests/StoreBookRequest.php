<?php

namespace App\Http\Requests;

use App\Models\Book;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'isbn' => [
                'string',
                'required'
            ],
            'author_id' => [
                'string',
                'required',
            ],
            'content' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
        ];
    }
}
