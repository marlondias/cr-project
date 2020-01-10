<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Por convenção, o Laravel já fez associação com a tabela Clientes pelo nome plural do model.

    // Regras para validação de cada campo desse model
    private static $formValidationRules = [
        'nome_completo' => 'required|string|max:100',
        'data_nascimento' => 'required|date_format:YYYY-mm-dd',
        'sexo' => 'required|integer|min:0|max:3',
        'cep' => 'numeric|digits:8',
        'ender_logr' => 'string|max:60',
        'ender_num' => 'string|max:10',
        'ender_comp' => 'string|max:20',
        'ender_bairro' => 'string|max:60',
        'ender_cidade' => 'string|max:30',
        'ender_uf' => 'alpha|size:2',
    ];

    public static function getFormValidationRules() {
        return self::$formValidationRules;
    }
    




}
