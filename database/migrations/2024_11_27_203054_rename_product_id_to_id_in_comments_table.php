<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProductIdToIdInCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('product_id', 'id');
        });
      
        Schema::table('product_tag', function (Blueprint $table) {
            $table->timestamp('end_date')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('id', 'product_id');
        });
       
        Schema::table('product_tag', function (Blueprint $table) {
            $table->timestamp('end_date')->nullable(false)->change();
        });
    }
}
