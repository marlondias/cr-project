<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    public function index() {
        // Exibir tela geral. Listar todos os clientes da base de dados, ou uma mensagem se não houver.
        //return view('main-layout');
        $clientes = Cliente::all();
        echo ($clientes);
        return ;
    }

    public function create() {
        // Exibir tela de edição individual com todos os campos vazios.
        return view('criar')
        ->with('txtRetorno', 'Voltar à listagem')
        ->with('urlRetorno', '/clientes')
        ->with('txtTitulo', 'Cadastro de cliente');
    }

    public function store(Request $request) {
        // Validar novamente os campos e gravar como novo Cliente no banco de dados.

        $validatedInput = $request->validate(Cliente::getFormValidationRules());

        return view('larawelcome');


        //return 'Cliente X registrado!';
    }

    public function edit($id) {
        // Encontrar Cliente com essa ID e exibir tela de edição, ou voltar para Index.
        $cliente = Cliente::find($id);

        return view('criar')
        ->with('txtRetorno', 'Voltar à listagem')
        ->with('urlRetorno', '/clientes')
        ->with('txtTitulo', 'Editando o cliente de ID '. $id)
        ->with('cliente', $cliente);
    }

    public function update($id) {
        // Validar novamente os novos dados e atualizar registro do banco de dados.
        return 'Cliente X teve seus dados atualizados!';
    }

    public function delete($id) {
        // Encontrar um Cliente com a ID informada, guardar nome e remover do BD.
        $cliente = Cliente::find($id);
        $nome = $cliente->nome_completo;
        $cliente->delete();

        // Preparar uma mensagem e redirecionar para a Index
        Session::flash('message', 'O cliente "' . $nome . '" foi removido de sua base de dados!');
        return Redirect::to('/clientes');
    }
}
