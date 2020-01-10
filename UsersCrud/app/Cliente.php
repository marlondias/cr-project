<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Por convenção, o Laravel já fez associação com a tabela Clientes pelo nome plural do model.

    // Regras para validação de cada campo desse model
    private static $formValidationRules = [
        'nome_completo' => 'required|string|max:100|regex:/^[a-z àèìòùáéíóúäëïöüãẽĩõũâêîôû]{2,30}$/i',
        'data_nascimento' => 'required|date',
        'sexo' => 'required|integer|min:0|max:3',
        'cep' => 'nullable|numeric|digits:8',
        'ender_logr' => 'nullable|string|max:60',
        'ender_num' => 'nullable|string|max:10',
        'ender_comp' => 'nullable|string|max:20',
        'ender_bairro' => 'nullable|string|max:60',
        'ender_cidade' => 'nullable|string|max:30',
        'ender_uf' => 'nullable|alpha|size:2',
    ];

    public static function getFormValidationRules() {
        return self::$formValidationRules;
    }
    




}
