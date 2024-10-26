@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.book.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.books.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.id') }}
                        </th>
                        <td>
                            {{ $book->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.title') }}
                        </th>
                        <td>
                            {{ $book->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.isbn') }}
                        </th>
                        <td>
                            {{ $book->isbn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.author') }}
                        </th>
                        <td>
                            {{ $book->author->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.description') }}
                        </th>
                        <td>
                            {{ $book->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.content') }}
                        </th>
                        <td>
                            {!! $book->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.price') }}
                        </th>
                        <td>
                            {{ $book->price }} LYD
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.image') }}
                        </th>
                        <td>
                            @if($book->image)
                                <a href="{{ $book->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $book->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.created_at') }}
                        </th>
                        <td>
                            {{ $book->created_at->diffForHumans() }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.books.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
