<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Por convenção, o Laravel já fez associação com a tabela Clientes pelo nome plural do model.

    // Regras para validação de cada campo desse model
    private static $formValidationRules = [
        'nome_completo'   => 'required|string|max:100|regex:/^[a-z àèìòùáéíóúäëïöüãẽĩõũâêîôû]+$/i',
        'data_nascimento' => 'required|date',
        'sexo'            => 'required|integer|min:0|max:3',
        'cep'             => 'nullable|numeric|digits:8',
        'ender_logr'      => 'nullable|string|max:60',
        'ender_num'       => 'nullable|string|max:10',
        'ender_comp'      => 'nullable|string|max:20',
        'ender_bairro'    => 'nullable|string|max:60',
        'ender_cidade'    => 'nullable|string|max:30',
        'ender_uf'        => 'nullable|alpha|size:2',
    ];

    public static function getFormValidationRules() {
        return self::$formValidationRules;
    }

    public static function setFieldsTo(Cliente $cli, Array $data) {
        if (isset($data['nome_completo'])) $cli->nome_completo = $data['nome_completo'];
        if (isset($data['data_nascimento'])) $cli->nascimento = $data['data_nascimento'];
        if (isset($data['sexo'])) $cli->sexo = $data['sexo'];

        if (isset($data['cep'])) {
            $cli->end_cep = (!empty($data['cep']) || $data['cep'] == '0') ? $data['cep'] : null;
        }

        if (isset($data['ender_logr'])) {
            $cli->end_logradouro = (!empty($data['ender_logr']) || $data['ender_logr'] == '0') ? $data['ender_logr'] : null;
        }

        if (isset($data['ender_num'])) {
            $cli->end_numero = (!empty($data['ender_num']) || $data['ender_num'] == '0') ? $data['ender_num'] : null;
        }

        if (isset($data['ender_comp'])) {
            $cli->end_complemento = (!empty($data['ender_comp']) || $data['ender_comp'] == '0') ? $data['ender_comp'] : null;
        }

        if (isset($data['ender_bairro'])) {
            $cli->end_bairro = (!empty($data['ender_bairro']) || $data['ender_bairro'] == '0') ? $data['ender_bairro'] : null;
        }

        if (isset($data['ender_cidade'])) {
            $cli->end_cidade = (!empty($data['ender_cidade']) || $data['ender_cidade'] == '0') ? $data['ender_cidade'] : null;
        }

        if (isset($data['ender_uf'])) {
            $cli->end_uf = (!empty($data['ender_uf']) || $data['ender_uf'] == '0') ? $data['ender_uf'] : null;
        }

    }

}
