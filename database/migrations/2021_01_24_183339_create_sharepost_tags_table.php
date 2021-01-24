<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharepostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharepost_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sharepost_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('sharepost_id')->references('id')->on('shareposts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // sharepost_idとtag_idの組み合わせの重複を許さない
            $table->unique(['sharepost_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sharepost_tags');
    }
}
