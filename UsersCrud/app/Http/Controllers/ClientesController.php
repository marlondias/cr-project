<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Validator;
use App\Cliente;


class ClientesController extends Controller
{
    public function index() {
        // Exibir tela geral. Listar todos os clientes da base de dados, ou uma mensagem se não houver.
        return view('index')
        ->with('txtRetorno', 'Sair do sistema')
        ->with('urlRetorno', '/')
        ->with('txtTitulo', 'Listagem de clientes');
    }

    public function create() {
        // Exibir tela de edição individual com todos os campos vazios. [OK]
        return view('criar')
        ->with('txtRetorno', 'Voltar à listagem')
        ->with('urlRetorno', '/clientes')
        ->with('txtTitulo', 'Cadastro de cliente');
    }

    public function store(Request $request) {
        // Validar entradas do usuário, segundo as regras do modelo
        $validator = Validator::make($request->all(), Cliente::getFormValidationRules());

        if ($validator->fails()) {
            return $validator;
            /*
            return Redirect::to('/clientes/criar')
            ->withErrors($validator)
            ->withInput($request->all());*/
        }
        else {
            // Registrar no BD
            $cliente = new Cliente;

            $nome = $request->input('nome_completo');
            $cliente->nome_completo = $request->input('nome_completo');
            $cliente->nascimento = $request->input('data_nascimento');
            $cliente->sexo = $request->input('sexo');
            $cliente->end_cep = $request->input('cep');
            $cliente->end_logradouro = $request->input('ender_logr');
            $cliente->end_numero = $request->input('ender_num');
            $cliente->end_complemento = $request->input('ender_comp');
            $cliente->end_bairro = $request->input('ender_bairro');
            $cliente->end_cidade = $request->input('ender_cidade');
            $cliente->end_uf = $request->input('ender_uf');

            $cliente->save();

            // Redirecionar com aviso
            Session::flash('message_info', 'Cliente de nome "' . $nome . '" foi adicionado.');
            return Redirect::to('/clientes');
        }



        return 'Cliente X registrado!';
    }

    public function edit($id) {
        // Encontrar Cliente com essa ID e exibir tela de edição, ou voltar para Index.
        $cliente = Cliente::find($id);

        if (!$cliente){
            Session::flash('message_error', 'Não exite cliente cadastrado com ID '.$id.'.');
            return Redirect::to('/clientes');
        }

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
        Session::flash('flash_message', 'O cliente "' . $nome . '" foi removido de sua base de dados!');
        return Redirect::to('/clientes');
    }
}
