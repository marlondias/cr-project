class ClientFormInput {
    constructor (elementID, helperID, helperText, validationFunction) {
        this.element = document.getElementById(elementID);
        this.helper = document.getElementById(helperID);
        this.helperDefaultText = (typeof helperText == 'string') ? helperText : '';
        this.validationFn = (typeof validationFunction == 'function') ? validationFunction : () => { return false };
        this.isValid = undefined;
    }

    setAsInvalid(helperMsg) {
        // Ativar flag de erro nos elementos e modificar texto, quando possível
        this.element.classList.add('invalido');
        if (this.helper) {
            this.helper.classList.add('invalido');
            this.helper.innerText = 
                (typeof helperMsg == 'string' && helperMsg.length > 0) ? helperMsg : '';
        }
    }

    setAsValid() {
        // Apagar flag de erro dos elementos e restaurar texto padrão
        this.element.classList.remove('invalido');
        if (this.helper) {
            this.helper.classList.remove('invalido');
            this.helper.innerText = this.helperDefaultText;
        }
    }

    validate = (() => {
        // Verificar se o valor preenchido corresponde ao esperado para o campo
        const value = this.element.value;
        if (value.length == 0) {
            if (this.element.hasAttribute('required')) {
                this.isValid = false;
                this.setAsInvalid('Este campo deve ser preenchido.');
                return false;
            }
            else {
                this.isValid = undefined;
                this.setAsValid();
                return true;
            }
        }
        if (this.validationFn(value)) {
            this.isValid = true;
            this.setAsValid();
        }
        else {
            this.isValid = false;
            this.setAsInvalid('Esse valor não é permitido.')
        }
    }).bind();

}

class EnderecoChanger {
    constructor (elLogr, elNum, elCompl, elBai, elCid, elEst) {
        this.logradouro = document.getElementById(elLogr);
        this.numero = document.getElementById(elNum);
        this.complemento = document.getElementById(elCompl);
        this.bairro = document.getElementById(elBai);
        this.cidade = document.getElementById(elCid);
        this.estado = document.getElementById(elEst);
    }

    disableAllFields() {
        // Adicionar DISABLED nos inputs de endereço, exceto CEP
        this.logradouro.setAttribute('disabled', 'true');
        this.numero.setAttribute('disabled', 'true');
        this.complemento.setAttribute('disabled', 'true');
        this.bairro.setAttribute('disabled', 'true');
        this.cidade.setAttribute('disabled', 'true');
        this.estado.setAttribute('disabled', 'true');
    }

    enableAllFields() {
        // Remover DISABLED dos inputs de endereço, exceto CEP
        this.logradouro.removeAttribute('disabled');
        this.numero.removeAttribute('disabled');
        this.complemento.removeAttribute('disabled');
        this.bairro.removeAttribute('disabled');
        this.cidade.removeAttribute('disabled');
        this.estado.removeAttribute('disabled');
    }

    setValueForFields(logr, num, comp, bai, cid, est) {
        this.logradouro.value = (typeof logr == 'string') ? logr : '';
        this.numero.value = (typeof num == 'string') ? num : '';
        this.complemento.value = (typeof comp == 'string') ? comp : '';
        this.bairro.value = (typeof bai == 'string') ? bai : '';
        this.cidade.value = (typeof cid == 'string') ? cid : '';
        this.estado.value = (typeof est == 'string') ? est.toLowerCase() : '';
    }

    populateFieldsUsingViaCEP(cep) {
        this.disableAllFields();
        this.setValueForFields('...', '...', '...', '...', '...', '...');
        let self = this; // Alias bypassing THIS conflict
        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                self.setValueForFields(dados.logradouro, '', '', dados.bairro, dados.localidade, dados.uf)
                self.enableAllFields();
            }
            else {
                //CEP pesquisado não foi encontrado.
                console.error('Erro: Função ViaCEP ativada, mas CEP não encontrado. Inputs não serão liberados')
                alert("CEP em formato válido não foi encontrado.");
            }
        });
    }

}



window.onload = () => {
    // Capturar referências aos campos para manipulação centralizada
    const enderecoChng = new EnderecoChanger('inputLogradouro', 'inputNumero', 'inputComplemento', 'inputBairro', 'inputCidade', 'selectEstado');

    // Capturar referência a todos os inputs do form, definindo regras específicas de validação
    const inputs = new Map;
    
    inputs.set('nome', new ClientFormInput('inputNomeCompleto', 'helperNomeCompleto', 'Digite o nome completo no cliente', (value) => {
        // Regra: Permite letras (a-z) e alguns acentos comuns, case insensitive
        const regex = /^[a-z àèìòùáéíóúäëïöüãẽĩõũâêîôû]{2,30}$/i;
        return regex.test(value);
    }));

    inputs.set('nascimento', new ClientFormInput('inputDataNascimento', 'helperDataNascimento', 'Digite a data de nascimento', (value) => {
        // Regra: String de tamanho 10, data válida, anterior ou igual a hoje
        if (value.length != 10) return false;
        let dateNow = new Date();
        let dateInput = new Date(value);
        if (dateInput.getTime() > dateNow.getTime()) return false;
        return true;
    }));

    inputs.set('sexo', new ClientFormInput('selectSexo', 'helperSexo', '', (value) => {
        // Regra: Algum dos 4 valores predefinidos
        if (value >= 0 && value < 4) return true;
        else return false;
    }));

    inputs.set('cep', new ClientFormInput('inputCEP', 'helperCEP', 'Digite apenas números', (value) => {
        // Regra: String numérica de 8 caracteres
        const regex = /^[0-9]{8}$/;
        if (regex.test(value)) {
            // Ativar mudanças nos campos com viaCEP, retornar TRUE
            enderecoChng.populateFieldsUsingViaCEP(value);
            return true;
        }
        else {
            // Desativar demais campos e retornar FALSE
            enderecoChng.disableAllFields();
            enderecoChng.setValueForFields('', '', '', '', '', '');
            return false;
        }
    }));

    inputs.set('enderLogr', new ClientFormInput('inputLogradouro', null, null, () => { return true }));
    inputs.set('enderNum', new ClientFormInput('inputNumero', null, null, () => { return true }));
    inputs.set('enderComp', new ClientFormInput('inputComplemento', null, null, () => { return true }));
    inputs.set('enderBairro', new ClientFormInput('inputBairro', null, null, () => { return true }));
    inputs.set('enderCidade', new ClientFormInput('inputCidade', null, null, () => { return true }));
    inputs.set('enderEstado', new ClientFormInput('selectEstado', null, null, () => { return true }));


    //Iterar pelos inputs registrados, adicionando eventos de mudança
    for(let i of inputs) {
        let elem = i[1].element;
        elem.addEventListener('change', () => {
            i[1].validate();
        });
    }

};

