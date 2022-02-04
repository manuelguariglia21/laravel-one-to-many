<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('category_id')->nullable()->after('id'); //creo la colonna della foregn key, può essere nullable e si deve posizionare dopo id

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');//quando cancello la categoria viene settata su null
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//bisogna settare il down per il rollback della migration
    {
        Schema::table('posts', function (Blueprint $table) {
            
            //prima elimino la FK e poi la categoria, altrimenti mi da errore
            $table->dropForeign(['category_id']); //accetta un array perche posso passarne più di una
            $table->dropColumn(['category_id']);

            

        });
    }
}
