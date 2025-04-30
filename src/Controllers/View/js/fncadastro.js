//Iniciar a seleção dos elementos

var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var btnCadastrar = document.querySelector("#btn_Cadastrar");
var inp_nome = document.getElementById("nome");
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
var safe_cpf,safe_cnpj,nome,user,pwd,rg,tel,cel,data_nasc;


function Validar_Campos(){

    // Tipo de validação se o CPF for selecionado
    if(rb_cpf.checked==true){
        if(inp_CPF.value!=""){
            var arraycpf = inp_CPF.value.split("").map(Number);
            safe_cpf = Validador_CPF(arraycpf);
            if(safe_cpf==false){
                alert("CPF informado não é válido!");
            }
        }
    }
    //Tipo de validação se o CNPJ for selecionado
    else if (rb_cnpj.checked==true){
        if(inp_CNPJ.value!=""){
            var arraycnpj = inp_CNPJ.value.split("").map(Number);
            safe_cnpj = Validador_CNPJ(arraycnpj);
            if(safe_cnpj==false){
                alert("CNPJ informado não é válido!");
            }
        }
    }

        //Verificação se os outros campos estão vazios
    if((inp_nome.value=="")||(inp_user.value=="")||(inp_pwd.value == "")||(inp_email.value=="")||(inp_tel.value=="")||(inp_cel.value=="")||(inp_data.value=="")){
        alert("Preencha todos campos corretamente!");      
    }
    else{
        var result_nome = Validador_Nome(inp_nome.value);
        var result_user = Validador_Usuario(inp_user.value);
        var result_pwd = Validador_Senha(inp_pwd.value);
        var result_email = Validador_Email(inp_email.value);
        var result_tel = Validador_Tel(inp_tel.value);
        var result_cel = Validador_Celular(inp_cel.value);
        var result_data = Validador_Data(inp_data.value);

        if((result_nome==true)&&(result_user==true)&&(result_pwd==true)&&(result_email==true)&&(result_tel==true)&&(result_cel==true)&&(result_data==true)){
            url = "http://"+config_API_Cadastro.API_CONECT;
            alert(url);
        }
        else{
            url = "http://"+config_API_Cadastro.API_CONECT;
            alert(url);
        }
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
    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s\-]+$/;
    if(regex.test(div.innerHTML)){
        return true;
    }
    else{
        return false;
    }
}

function Validador_Usuario(user){
    let div = document.createElement("div");
    div.textContent=user;

    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s\-]+$/;
    if(regex.test(div.innerHTML)){
        return true;
    }
    else{
        return false;
    }
}

function Validador_Senha(pwd){
    let div = document.createElement("div");
    div.textContent=pwd;

    if(div.innerHTML < 8){
        return false;
    }
    else{
        if(div.innerHTML >=8){
            return true;
        }
    }
}

function Validador_Email(email){
    let div = document.createElement("div");
    div.textContent=email;

    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(regex.test(div.innerHTML)==true){
        return true;
    }
    else{
        return false;
    }
    
}

function Validador_Tel(tel){
    let div = document.createElement("div");
    div.textContent=tel;
    let content = div.innerHTML;
    if(content.length==10){
        return true;
    }
    else{
        return false;
    }
}

function Validador_Celular(cel){
    let div = document.createElement("div");
    div.textContent=cel;
    let content = div.innerHTML;
    if(content.length==11){
        return true;
    }
    else{
        return false;
    }
}

function Validador_Data(data){
    let div = document.createElement("div");
    div.textContent=data;
    let content = div.innerHTML;

    const regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;

    if(regex.test(div.innerHTML) == true){
        return true;
    }
    else{
        return false;
    }


}