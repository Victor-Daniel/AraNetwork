//Iniciar a seleção dos elementos

var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var btnCadastrar = document.querySelector("#btn_Cadastrar");
var inp_nome = document.getElementById("inp_nome");
var inp_CPF = document.getElementById("CPF");
var inp_CNPJ = document.getElementById("CNPJ");
var inp_user = document.getElementById("user");
var inp_pwd = document.getElementById("pwd");
var inp_email = document.getElementById("email");
var inp_tel = document.getElementById("tel");
var inp_cel = document.getElementById("cel");
var inp_data = document.getElementById("data");
//---------------------------------------------------------------------------------------------------------

//Variáveis p/ dados tratados.
var safe_cpf,safe_cnpj;


function Validar_Campos(){

    // Tipo de validação se o CPF for selecionado
    if(rb_cpf.checked==true){
        if(inp_CPF.value!=""){
            var arraycpf = inp_CPF.value.split("").map(Number);
            safe_cpf = Validador_CPF(arraycpf);
        }
    }
    //Tipo de validação se o CNPJ for selecionado
    else if (rb_cnpj.checked==true){
        if(inp_CNPJ.value!=""){
            var arraycnpj = inp_CNPJ.value.split("").map(Number);
            safe_cnpj = Validador_CNPJ(arraycnpj);
        }
    }

        //Verificação se os outros campos estão vazios
    if((inp_nome.value=="")||(inp_user.value=="")||(inp_pwd.value == "")||(inp_email.value=="")||(inp_tel.value=="")||(inp_cel.value=="")||(inp_data.value=="")){
        alert("Preencha todos campos corretamente!");        }
    else{
        result_nome = Validador_Nome(inp_nome.value);
        alert(result_nome);
    }
    
}

btnCadastrar.addEventListener("click",function e(){
    Validar_Campos();
});

function Validador_CPF(arraycpf){
    let i,j,soma,dv1,dv2,resto;

    // Calculando Digito Verificador 1
    i,soma=0;
    j = 10;
    for(i=0; i<9; i++){
        soma+=arraycpf[i]*j;
        j = j-1;
    }
    
    resto = soma % 11;

    if(resto < 2){
        dv1 = 0;
    }
    else{
        dv1 = 11 - resto;
    }

    //Calcular Digito verificador 2

    soma = 0;
    j = 11;

    for(i=0; i<10; i++){
        soma+=arraycpf[i]*j;
        j = j-1;
    }

    resto = soma % 11;

    if(resto < 2){
        dv2 = 0;
    }
    else{
        dv2 = 11 - resto;
    }

    //Comparação com os resultados.
    if((dv1 == arraycpf[9])&&(dv2 == arraycpf[10])){
        return true;
    }
    else{
        return false;
    }
}

function Validador_CNPJ(arraycnpj){
    
    let i, soma, dv1, dv2, resto;

    //Calculando Digito Validador 1
    let pesos1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    soma = 0;

    for (i = 0; i < 12; i++) {
        soma += arraycnpj[i] * pesos1[i];
    }

    resto = soma % 11;

    if(resto < 2){
        dv1 = 0;
    }
    else{
        dv1 = 11 - resto;
    }

    //Digito validador 2

    let pesos2 = [6].concat(pesos1); // mesma lista, mas começa com 6
    soma = 0;
    for (i = 0; i < 13; i++) {
        soma += arraycnpj[i] * pesos2[i];
    }

    resto = soma % 11;

    if(resto < 2){
        dv2 = 0;
    }
    else{
        dv2 = 11 - resto;
    }
    

    //Comparação

    if((dv1 == arraycnpj[12])&&(dv2==arraycnpj[13])){
        return true;
    }
    else{
        return false;
    }


}

function Validador_Nome(nome){
    let div = document.createElement("div");
    div.textContent=nome;
    return div.innerHTML;
}
