@extends('layout.master')

@section('corpo')
<div class="container">
    {{ Form::open(array('url' => '/clientes/'.$cliente->id, 'id' => 'formCriar')) }}
        <section class="row">
            <h4 class="col-12">Dados pessoais</h4>
            <div class="form-group col-6">
                <label for="inputNomeCompleto">Nome completo <span class="obrigatorio">&#42;</span></label>
                <input type="text" name="nome_completo" id="inputNomeCompleto" class="form-control" maxlength="100" value="@if( null !== old('nome_completo') ){{ old('nome_completo') }} @elseif ( null !== $cliente->nome_completo ){{ $cliente->nome_completo }} @else{{ '' }} @endif" placeholder="Nome completo do cliente" required>
                <small id="helperNomeCompleto" class="form-text">Digite o nome completo no cliente</small>
            </div>
            <div class="form-group col-3">
                <label for="inputDataNascimento">Data de nascimento <span class="obrigatorio">&#42;</span></label>
                <input type="date" name="data_nascimento" id="inputDataNascimento" class="form-control" maxlength="10" value="@if( null !== old('data_nascimento') ){{ old('data_nascimento', date('Y-m-d')) }} @elseif ( null !== $cliente->nascimento ){{ $cliente->nascimento }} @else{{ '' }} @endif" required>
                <small id="helperDataNascimento" class="form-text">Digite a data de nascimento</small>
            </div>
            <div class="form-group col-3">
                <label for="selectSexo">Sexo <span class="obrigatorio">&#42;</span></label>
                <select name="sexo" id="selectSexo" class="form-control" required>
                    <option selected disabled>Escolha o sexo...</option>
                    <option value="1" @if( old('sexo') == '1' ){{ 'selected' }} @elseif( $cliente->sexo == '1' ){{ 'selected' }} @endif>Masculino</option>
                    <option value="2" @if( old('sexo') == '2' ){{ 'selected' }} @elseif( $cliente->sexo == '2' ){{ 'selected' }} @endif>Feminino</option>
                    <option value="3" @if( old('sexo') == '3' ){{ 'selected' }} @elseif( $cliente->sexo == '3' ){{ 'selected' }} @endif>Não-binário</option>
                    <option value="0" @if( old('sexo') == '0' ){{ 'selected' }} @elseif( $cliente->sexo == '0' ){{ 'selected' }} @endif>Não informado</option>
                </select>
                <small id="helperSexo" class="form-text"></small>
            </div>
        </section>

        <section class="row">
            <h4 class="col-12">Endereço</h4>

            <div class="form-group col-2">
                <label for="inputCEP">CEP</label>
                <input type="text" name="cep" id="inputCEP" class="form-control" maxlength="8" value="@if( null !== old('cep') ){{ old('cep') }} @elseif ( null !== $cliente->end_cep ){{ $cliente->end_cep }} @else{{ '' }} @endif" placeholder="00000000">
                <small id="helperCEP" class="form-text">Digite apenas números</small>
            </div>
            <div class="form-group col-5">
                <label for="inputLogradouro">Logradouro</label>
                <input type="text" name="ender_logr" id="inputLogradouro" class="form-control" maxlength="60" value="@if( null !== old('ender_logr') ){{ old('ender_logr') }} @elseif ( null !== $cliente->end_logradouro ){{ $cliente->end_logradouro }} @else{{ '' }} @endif" placeholder="Nome da rua, avenida, rodovia, etc">
            </div>
            <div class="form-group col-2">
                <label for="inputNumero">Número</label>
                <input type="text" name="ender_num" id="inputNumero" class="form-control" maxlength="10" value="@if( null !== old('ender_num') ){{ old('ender_num') }} @elseif ( null !== $cliente->end_numero ){{ $cliente->end_numero }} @else{{ '' }} @endif" placeholder="Número externo">
            </div>
            <div class="form-group col-3">
                <label for="inputComplemento">Complemento</label>
                <input type="text" name="ender_comp" id="inputComplemento" class="form-control" maxlength="20" value="@if( null !== old('ender_comp') ){{ old('ender_comp') }} @elseif ( null !== $cliente->end_complemento ){{ $cliente->end_complemento }} @else{{ '' }} @endif" placeholder="Exs: Apto 5, Fundos">
            </div>
            <div class="form-group col-6">
                <label for="inputBairro">Bairro</label>
                <input type="text" name="ender_bairro" id="inputBairro" class="form-control" maxlength="60" value="@if( null !== old('ender_bairro') ){{ old('ender_bairro') }} @elseif ( null !== $cliente->end_bairro ){{ $cliente->end_bairro }} @else{{ '' }} @endif" placeholder="Nome oficial e sem abreviações">
            </div>
            <div class="form-group col-3">
                <label for="inputCidade">Cidade</label>
                <input type="text" name="ender_cidade" id="inputCidade" class="form-control" maxlength="30" value="@if( null !== old('ender_cidade') ){{ old('ender_cidade') }} @elseif ( null !== $cliente->end_cidade ){{ $cliente->end_cidade }} @else{{ '' }} @endif" placeholder="Nome da cidade">
            </div>
            <div class="form-group col-3">
                <label for="selectEstado">Estado</label>
                <select name="ender_uf" id="selectEstado" class="form-control">
                    <option selected disabled>Escolha o estado...</option>
                    <option value="ac" @if( old('ender_uf') == 'ac' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ac' ){{ 'selected' }} @endif>Acre</option>
                    <option value="al" @if( old('ender_uf') == 'al' ){{ 'selected' }} @elseif( $cliente->end_uf == 'al' ){{ 'selected' }} @endif>Alagoas</option>
                    <option value="ap" @if( old('ender_uf') == 'ap' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ap' ){{ 'selected' }} @endif>Amapá</option>
                    <option value="am" @if( old('ender_uf') == 'am' ){{ 'selected' }} @elseif( $cliente->end_uf == 'am' ){{ 'selected' }} @endif>Amazonas</option>
                    <option value="ba" @if( old('ender_uf') == 'ba' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ba' ){{ 'selected' }} @endif>Bahia</option>
                    <option value="ce" @if( old('ender_uf') == 'ce' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ce' ){{ 'selected' }} @endif>Ceará</option>
                    <option value="df" @if( old('ender_uf') == 'df' ){{ 'selected' }} @elseif( $cliente->end_uf == 'df' ){{ 'selected' }} @endif>Distrito Federal</option>
                    <option value="es" @if( old('ender_uf') == 'es' ){{ 'selected' }} @elseif( $cliente->end_uf == 'es' ){{ 'selected' }} @endif>Espírito Santo</option>
                    <option value="go" @if( old('ender_uf') == 'go' ){{ 'selected' }} @elseif( $cliente->end_uf == 'go' ){{ 'selected' }} @endif>Goiás</option>
                    <option value="ma" @if( old('ender_uf') == 'ma' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ma' ){{ 'selected' }} @endif>Maranhão</option>
                    <option value="mt" @if( old('ender_uf') == 'mt' ){{ 'selected' }} @elseif( $cliente->end_uf == 'mt' ){{ 'selected' }} @endif>Mato Grosso</option>
                    <option value="ms" @if( old('ender_uf') == 'ms' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ms' ){{ 'selected' }} @endif>Mato Grosso do Sul</option>
                    <option value="mg" @if( old('ender_uf') == 'mg' ){{ 'selected' }} @elseif( $cliente->end_uf == 'mg' ){{ 'selected' }} @endif>Minas Gerais</option>
                    <option value="pa" @if( old('ender_uf') == 'pa' ){{ 'selected' }} @elseif( $cliente->end_uf == 'pa' ){{ 'selected' }} @endif>Pará</option>
                    <option value="pb" @if( old('ender_uf') == 'pb' ){{ 'selected' }} @elseif( $cliente->end_uf == 'pb' ){{ 'selected' }} @endif>Paraíba</option>
                    <option value="pr" @if( old('ender_uf') == 'pr' ){{ 'selected' }} @elseif( $cliente->end_uf == 'pr' ){{ 'selected' }} @endif>Paraná</option>
                    <option value="pe" @if( old('ender_uf') == 'pe' ){{ 'selected' }} @elseif( $cliente->end_uf == 'pe' ){{ 'selected' }} @endif>Pernambuco</option>
                    <option value="pi" @if( old('ender_uf') == 'pi' ){{ 'selected' }} @elseif( $cliente->end_uf == 'pi' ){{ 'selected' }} @endif>Piauí</option>
                    <option value="rj" @if( old('ender_uf') == 'rj' ){{ 'selected' }} @elseif( $cliente->end_uf == 'rj' ){{ 'selected' }} @endif>Rio de Janeiro</option>
                    <option value="rn" @if( old('ender_uf') == 'rn' ){{ 'selected' }} @elseif( $cliente->end_uf == 'rn' ){{ 'selected' }} @endif>Rio Grande do Norte</option>
                    <option value="rs" @if( old('ender_uf') == 'rs' ){{ 'selected' }} @elseif( $cliente->end_uf == 'rs' ){{ 'selected' }} @endif>Rio Grande do Sul</option>
                    <option value="ro" @if( old('ender_uf') == 'ro' ){{ 'selected' }} @elseif( $cliente->end_uf == 'ro' ){{ 'selected' }} @endif>Rondônia</option>
                    <option value="rr" @if( old('ender_uf') == 'rr' ){{ 'selected' }} @elseif( $cliente->end_uf == 'rr' ){{ 'selected' }} @endif>Roraima</option>
                    <option value="sc" @if( old('ender_uf') == 'sc' ){{ 'selected' }} @elseif( $cliente->end_uf == 'sc' ){{ 'selected' }} @endif>Santa Catarina</option>
                    <option value="sp" @if( old('ender_uf') == 'sp' ){{ 'selected' }} @elseif( $cliente->end_uf == 'sp' ){{ 'selected' }} @endif>São Paulo</option>
                    <option value="se" @if( old('ender_uf') == 'se' ){{ 'selected' }} @elseif( $cliente->end_uf == 'se' ){{ 'selected' }} @endif>Sergipe</option>
                    <option value="to" @if( old('ender_uf') == 'to' ){{ 'selected' }} @elseif( $cliente->end_uf == 'to' ){{ 'selected' }} @endif>Tocantins</option>
                </select>
            </div>
        </section>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop

@section('scripts')
<script src="/js/clienteFormValidation.js"></script>
@stop

