<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nome_completo', 100);
            $table->date('nascimento');
            $table->tinyInteger('sexo');
                        
            $table->string('end_cep', 8)->nullable();
            $table->string('end_logradouro', 60)->nullable();
            $table->string('end_numero', 10)->nullable();
            $table->string('end_complemento', 20)->nullable();
            $table->string('end_bairro', 60)->nullable();
            $table->string('end_cidade', 30)->nullable();
            $table->string('end_uf', 2)->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
