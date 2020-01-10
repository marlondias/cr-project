@extends('layout.master')

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-success" href="/clientes/criar"><i class="fas fa-user-plus"></i> Adicionar um cliente</a>
        </div>
    </div>
</div>

<div class="container">
    @if( count($clientes) === 0 )
    <div class="row">
        <div class="col-12">
        <h2>Não existem clientes cadastrados em sua base de dados.</h2>
        </div>
    </div>
    @else

        @forEach($clientes as $cli)
            @if( $loop->first )
            <div class="row">
            @elseif ( $loop->index % 3 === 0)
            </div>
            <div class="row">
            @endif

            <div class="col-12 col-md-4">
                <div class="item-cliente">
                    <div class="card">
                        <div class="card-header">
                            <span class="cliente-nome float-left"><i class="fas fa-user"></i> {{ $cli->nome_completo }}</span>
                            <span class="cliente-id badge badge-pill badge-secondary float-right">ID {{ $cli->id }}</span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item campo-comum">
                                    <small class="label">Nascimento:</small>
                                    <span class="valor">{{ $cli->nascimento ?? 'Não informado' }}</span>
                                </li>    
                                <li class="list-group-item campo-comum">
                                    <small class="label">Sexo:</small>
                                    <span class="valor">@if($cli->sexo == 0){{ 'Não informado' }} @elseif($cli->sexo == 1){{ 'Masculino' }} @elseif($cli->sexo == 2){{ 'Feminino' }} @elseif($cli->sexo == 3){{ 'Não-binário' }} @endif</span>
                                </li>
                                <li class="list-group-item campo-comum">
                                    <small class="label">Endereço:</small>
                                    <span class="valor">{{ $cli->end_logradouro ?? 'Rua desconhecida' }}, {{ $cli->end_numero ?? 'sem número' }}@isset($cli->end_complemento), {{ $cli->end_complemento }}@endisset</span>
                                </li>    
                                <li class="list-group-item campo-comum">
                                    <small class="label">Bairro:</small>
                                    <span class="valor">{{ $cli->end_bairro ?? 'Bairro desconhecido' }}</span>
                                </li>    
                                <li class="list-group-item campo-comum">
                                    <small class="label">CEP:</small>
                                    <span class="valor">{{ $cli->end_cep ?? 'Sem CEP' }}</span>
                                </li>
                                <li class="list-group-item campo-comum">
                                    <small class="label">Cidade:</small>
                                    <span class="valor">{{ $cli->end_cidade ?? 'Não informado' }} - {{ $cli->end_uf ?? 'XX' }}</span>
                                </li>    
                                <li class="list-group-item cliente-botoes">
                                    <a href="/clientes/{{ $cli->id }}" class="btn btn-info" title="Editar usuário"><i class="fas fa-user-edit"></i></a>
                                    <button type="button" class="btn btn-danger" title="Remover usuário" data-toggle="modal" data-target="#modalExclusao{{ $cli->id }}"><i class="fas fa-user-times"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if( $loop->last )
            </div>
            @endif

        @endForEach
    @endif
</div>


@forEach($clientes as $cli)
<div class="modal fade" id="modalExclusao{{ $cli->id }}" tabindex="-1" role="dialog" aria-labelledby="modalExclusao{{ $cli->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExclusao{{ $cli->id }}Title">Confirmar remoção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir o cliente <strong id="modalNomeCliente">{{ $cli->nome_completo }}</strong> (ID <span id="modalIdCliente">{{ $cli->id }}</span>) da base de dados?
            </div>
            <div class="modal-footer">
                {{ Form::open(array('url' => '/clientes/'.$cli->id) ) }}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button type="submit" class="btn btn-danger">Sim, excluir</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endForEach

@stop

@section('scripts')
<script>

</script>
@stop
