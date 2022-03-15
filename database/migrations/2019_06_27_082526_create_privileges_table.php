<?php
use App\Privilege;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('key')->unique();
            $table->string('name');
            $table->string('pslug')->unique();
            $table->string('icon');
            $table->string('path');
            $table->string('description');
            $table->boolean('status');
            
           
           
            
            
            $table->timestamps();
        });

    }


        

    /**
     * Reverse the migrations.php
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
