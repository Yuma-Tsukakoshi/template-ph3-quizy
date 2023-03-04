<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // upメソッド マイグレーションの実行に必要 新しいカラムを作る
    //create ---- table : ----がテーブル名になる  （マイグレーション時）
    // マイグレーションフォルダでバージョン管理する(tableの) 
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->string('image');
            $table->string('supplement');
            // $table->string('supplement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // dropメソッド テーブルを削除する
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
