<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('cat_id'); // ポストテーブルとカテゴリーテーブルの紐付けに利用します
            $table->text('content');
            $table->integer('user_id')->default(0);
            $table->unsignedInteger('comment_count')->default(0); // 投稿に何件のコメントがついたのかをカウントします
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
