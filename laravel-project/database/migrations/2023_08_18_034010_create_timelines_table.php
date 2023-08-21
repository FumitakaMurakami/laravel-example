<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table
                ->bigIncrements('id')
                ->comment('タイムラインid');
            
            $table
                ->unsignedInteger('user_id')
                ->comment('ユーザーID');

            $table
                ->json('timeline')
                ->comment('タイムライン');
            
            $table
                ->softDeletes($column = 'deleted_at', $precision = 0)
                ->comment('削除フラグ');
            
            $table
                ->dateTime('created_at', $precisian = 0)
                ->useCurrent()
                ->comment('作成日時');
            
            $table
                ->dateTime('updated_at', $precisian = 0)
                ->useCurrent()
                ->useCurrentOnUpdate()
                ->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timelines');
    }
}
