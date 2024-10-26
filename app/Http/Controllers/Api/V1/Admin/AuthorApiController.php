<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\Admin\AuthorResource;
use App\Http\Resources\Admin\BookResource;
use App\Models\Author;
use App\Models\Book;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AuthorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return new AuthorResource(Author::all());
    }


    public function booksByAuthor(Author $author)
    {
        return new BookResource(Book::where('author_id',$author->id)->get());
    }
}
