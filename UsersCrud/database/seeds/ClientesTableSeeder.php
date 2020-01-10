<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome_completo' => 'João da Silva',
            'sexo' => 1,
            'nascimento' => Carbon::parse('1950-06-20'),
            'end_cep' => '12332112',
            'end_logradouro' => 'Rua dos Sanfoneiros', 
            'end_numero' => '231',
            'end_bairro' => 'Zona Sul', 
            'end_cidade' => 'Cascavel', 
            'end_uf' => 'pr',
        ]);

        DB::table('clientes')->insert([
            'nome_completo' => 'Maria Joaquina Soares',
            'sexo' => 2,
            'nascimento' => Carbon::parse('1948-11-01'),
            'end_cep' => '36996352',
            'end_logradouro' => 'Avenida Santa Cecília',
            'end_numero' => '91',
            'end_complemento' => 'Casa',
            'end_bairro' => 'Conjunto Pôr do Sol',
            'end_cidade' => 'Pelotas', 
            'end_uf' => 'rs',
        ]);

        DB::table('clientes')->insert([
            'nome_completo' => 'Samer Pedroza',
            'sexo' => 3,
            'nascimento' => Carbon::parse('1998-03-18'),
            'end_cep' => '65445685',
            'end_logradouro' => 'Rua General Forônio', 
            'end_numero' => '500', 
            'end_complemento' => 'Apto 1103', 
            'end_bairro' => 'Jardim Horizonte',
            'end_cidade' => 'Cruzeiro do Centro', 
            'end_uf' => 'mt',
        ]);

        DB::table('clientes')->insert([
            'nome_completo' => 'Marcos Anonimatus',
            'sexo' => 0,
            'nascimento' => Carbon::parse('1989-01-04'),
            'end_cep' => '74125865',
            'end_logradouro' => 'Avenida Brasil', 
            'end_numero' => '9980', 
            'end_bairro' => 'Centro', 
            'end_cidade' => 'Colina Grande', 
            'end_uf' => 'ba',
        ]);

    }
}
