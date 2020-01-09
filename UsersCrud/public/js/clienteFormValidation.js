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

    validate() {
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
    }

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

    setFieldsStateTo(state) {
        const fieldNames = this.entries();
        console.log(fieldNames);
    }

}
const camposEndereco = {

};
function viaCEP() {
    console.log('Ativando via CEP!');
    console.log()
}

function setCamposEndereco(state) {
    if (typeof state != 'boolean') return;
    if (state) {
        // Remover disabled dos inputs de endereço
    }
    else {
        // Adicionar disabled nos inputs de endereço

    }
}

const inputs = new Map;

window.onload = () => {

    // Capturar referência a todos os inputs do form, definindo regras específicas
    inputs.set('nome', new ClientFormInput('inputNomeCompleto', 'helperNomeCompleto', 'Digite o nome completo no cliente', (value) => {
        // Regra: String alfanumérica, case insensitive, com unicode
        const regex = /[a-b0-9]+/i;
        return regex.test(value);
    }));

    inputs.set('nascimento', new ClientFormInput('inputDataNascimento', 'helperDataNascimento', 'Digite a data de nascimento', (value) => {
        // Regra: String de tamanho 10, data válida e anterior a hoje
        if (value.length != 10) return false;
        let dateMilisec = Date.parse(value);
        if (typeof dateMilisec != 'number' || dateMilisec >= Date.now) return false;
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
            // Ativar o viaCEP, liberar demais campos e retornar valor
            viaCEP();
            return true;
        }
        else {
            // Destivar demais campos e retornar FALSE

            return false;
        }
    }));

    const enderecoCh = new EnderecoChanger('inputLogradouro', 'inputNumero', 'inputComplemento', 'inputBairro', 'inputCidade', 'selectEstado');


/*    //Iterar pelos inputs adicionando eventos de saida do campo
    for(i in inputs) {
        i[1].element.addEventListener('change', (id) => {
            console.log('Houve mudança do elemento: ' + id);
        });
        console.log('x');
    }
*/
};

