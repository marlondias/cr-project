<template>
<div class="item-cliente">
  <div class="card">
    <div class="card-header">
      <span class="cliente-nome float-left"><i class="fas fa-user"></i> {{nome}}</span>
      <span class="cliente-id badge badge-pill badge-secondary float-right">ID {{id}}</span>
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
          <li class="list-group-item campo-comum">
              <small class="label">Nascimento: </small>
              <span class="valor" v-text="nascimento | checkOptionalField"></span>
          </li>    
          <li class="list-group-item campo-comum">
              <small class="label">Sexo: </small>
              <span class="valor">
                @if($cli->sexo == 0){{ 'Não informado' }} @elseif($cli->sexo == 1){{ 'Masculino' }} @elseif($cli->sexo == 2){{ 'Feminino' }} @elseif($cli->sexo == 3){{ 'Não-binário' }} @endif
              </span>
          </li>
          <li class="list-group-item campo-comum">
              <small class="label">Endereço: </small>
              <span class="valor">
                <span v-if="(e_logradouro != '')">{{e_logradouro}}</span>
                <span v-else>Rua desconhecida</span>
                <span v-if="(e_numero != '')">, {{e_numero}}</span>
                <span v-if="(e_complemento != '')">, {{e_complemento}}</span>
              </span>
          </li>
          <li class="list-group-item campo-comum">
              <small class="label">Bairro:</small>
              <span class="valor">
                <span v-if="(e_bairro != '')">{{e_bairro}}</span>
                <span v-else>Bairro desconhecido</span>
              </span>
          </li>
          <li class="list-group-item campo-comum">
              <small class="label">CEP:</small>
              <span class="valor">
                <span v-if="(e_cep != '')">{{e_cep}}</span>
                <span v-else>Sem CEP</span>
              </span>
          </li>
          <li class="list-group-item campo-comum">
              <small class="label">Cidade: </small>
              <span class="valor">
                <span v-if="(e_cidade != '')">{{e_cidade}}</span>
                <span v-else>Não informada</span>
                <span v-if="(e_uf != '')"> - {{e_uf}}</span>
              </span>
          </li>
          <li class="list-group-item cliente-botoes">
              <a href="/clientes/{{id}}" class="btn btn-info" title="Editar usuário"><i class="fas fa-user-edit"></i></a>
              <button type="button" class="btn btn-danger" title="Remover usuário" data-toggle="modal" data-target="#modalExclusao{{ $cli->id }}"><i class="fas fa-user-times"></i></button>
          </li>
      </ul>
    </div>
  </div>
</div>
</template>

<script>
export default {
  data: {
    id: 123,
    nome: 'XXXY YYYYXZZZZZ',
    nascimento: '2020-02-13',
    sexo: 2,
    e_logradouro: '',
    e_numero: '',
    e_complemento: '',
    e_bairro: '',
    e_cep: '',
    e_cidade: '',
    e_uf: ''
  },
}
</script>
