<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Cliente;


class ClientesController extends Controller
{
    public function index() {
        // Exibir tela geral. Listar todos os clientes da base de dados, ou uma mensagem se não houver.
        $clientes = Cliente::all();
        return view('index')
        ->with('txtRetorno', 'Sair do sistema')
        ->with('urlRetorno', '/')
        ->with('txtTitulo', 'Listagem de clientes ('. count($clientes) .')')
        ->with('clientes', $clientes);
    }

    public function create() {
        // Exibir tela de edição individual com todos os campos vazios. [OK]
        return view('criar')
        ->with('txtRetorno', 'Voltar à listagem')
        ->with('urlRetorno', '/clientes')
        ->with('txtTitulo', 'Cadastro de cliente');
    }

    public function store(Request $request) {
        // Validar entradas do usuário, segundo as regras do modelo [OK]
        $validator = Validator::make($request->all(), Cliente::getFormValidationRules());

        if ($validator->fails()) {
            // Voltar ao formulário com mensagem e valores
            Session::flash('message_error', 'Não foi possível prosseguir. Verifique os campos preenchidos.');
            return redirect('/clientes/criar')
            ->withInput();
        }

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
        return redirect('/clientes');

    }

    public function edit($id) {
        // Encontrar Cliente com essa ID e exibir tela de edição, ou voltar para Index.
        $cliente = Cliente::find($id);

        if (!$cliente){
            Session::flash('message_error', 'Não exite cliente cadastrado com ID '.$id.'.');
            return redirect('/clientes');
        }

        return view('editar')
        ->with('txtRetorno', 'Voltar à listagem')
        ->with('urlRetorno', '/clientes')
        ->with('txtTitulo', 'Editando o cliente de ID '. $id)
        ->with('cliente', $cliente);
    }

    public function update($id, Request $request) {
        // Validar entradas do usuário, segundo as regras do modelo 
        $validator = Validator::make($request->all(), Cliente::getFormValidationRules());

        if ($validator->fails()) {
            // Voltar ao formulário com mensagem e valores
            Session::flash('message_error', 'Não foi possível prosseguir. Verifique os campos preenchidos.');
            return redirect('/clientes/'.$id)
            ->withInput();
        }

        // Modificar no BD
        $cliente = Cliente::find($id);
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
        Session::flash('message_info', 'Cliente de ID "' . $id . '" foi modificado.');
        return redirect('/clientes');
    }

    public function delete($id) {
        // Encontrar um Cliente com a ID informada, guardar nome e remover do BD. [OK]
        $cliente = Cliente::find($id);
        $nome = $cliente->nome_completo;
        $cliente->delete();

        // Preparar uma mensagem e redirecionar para a Index
        Session::flash('message_info', 'O cliente de ID '. $id .' e nome "' . $nome . '" foi removido de sua base de dados!');
        return redirect('/clientes');
    }

    public function jsonGetAll() {
        $clientes = Cliente::all();
        return response($clientes)->header('Content-Type', 'application/json');
    }

    public function jsonCreate(Request $request) {
        // Valida entradas do usuário, segundo as regras do modelo.
        // Se estiver correto, instancia um Cliente, salva e retorna-o.
        // Se houver problema de validação, retorna os erros.

        $json = array();
        $data = $request->json()->all();
        $validator = Validator::make($data, Cliente::getFormValidationRules());

        if ($validator->fails()) {
            $json['errors'] = $validator->errors();
        }
        else {
            $cliente = new Cliente;
            Cliente::setFieldsTo($cliente, $data);
            $cliente->save();
            $json = $cliente;
        }

        return response($json)->header('Content-Type', 'application/json');
    }

    public function jsonGet($id) {
        // Procura um Cliente com essa ID.
        // Se encontrar retorna-o como JSON, se não, retorna vazio.

        $cliente = Cliente::find($id);
        $json = (!empty($cliente)) ? $cliente : [];

        return response($json)->header('Content-Type', 'application/json');
    }

    public function jsonUpdate(Request $request, $id) {
        // Busca pelo Cliente com a ID informada e retorna um JSON apropriado,
        // podendo ser: vazio, array de erros ou o Cliente atualizado.

        $cliente = Cliente::find($id);
        $json = array();

        if (!empty($cliente)) {
            // Validar entradas do usuário, segundo as regras do modelo.
            $data = $request->json()->all();
            $validator = Validator::make($data, Cliente::getFormValidationRules());
            if ($validator->fails()) {
                $json['errors'] = $validator->errors();
            }
            else {
                // Alterar, salvar e buscar novamente para usar como retorno.
                Cliente::setFieldsTo($cliente, $data);
                $cliente->save();
                $json = Cliente::find($id);
            }
        }

        return response($json)->header('Content-Type', 'application/json');
    }

    public function jsonDelete($id) {
        // Busca pelo Cliente com a ID informada, apaga e retorna o JSON apropriado,
        $cliente = Cliente::find($id);
        $json = array();
        
        if (!empty($cliente)) {
            $json = [
                'old_id' => $id,
                'old_nome' => $cliente->nome_completo
            ];
            $cliente->delete();
        }

        return response($json)->header('Content-Type', 'application/json');
    }

}
