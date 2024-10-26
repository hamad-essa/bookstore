<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('isbn');
            $table->text('description')->nullable;
            $table->longText('content');
            $table->decimal('price', 15, 2)->nullable();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id', 'author_id_fk_10185685')->references('id')->on('authors')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
