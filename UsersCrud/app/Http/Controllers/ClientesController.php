<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index() {
        return 'Exibir tela geral. Listar todos os clientes da base de dados, ou uma mensagem se não houver.';
    }

    public function create() {
        // Exibir tela de edição individual com todos os campos vazios.
        return 'Exibir tela de edição individual com todos os campos vazios.';
    }

    public function store() {
        // Validar novamente os campos e gravar como novo Cliente no banco de dados.
        return 'Cliente X registrado!';
    }

    public function edit($id) {
        // Exibir tela de edição individual, do cliente X, com campos preenchidos mas editáveis.
        return 'Exibir tela de edição individual, do cliente X, com campos preenchidos mas editáveis.';
    }

    public function update($id) {
        // Validar novamente os novos dados e atualizar registro do banco de dados.
        return 'Cliente X teve seus dados atualizados!';
    }

    public function show($id) {
        // OPCIONAL. Exibir tela de visualização individual com os dados de X.
        return 'OPCIONAL. Exibir tela de visualização individual com os dados de X.';
    }

    public function delete($id) {
        // Remover o Cliente com a id informada do banco de dados.
        // Usar soft delete?
        return 'Cliente X removido!';
    }
}
