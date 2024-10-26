<?php

namespace App\Http\Requests;

use App\Models\Book;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_edit');
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
