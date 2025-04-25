var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var btnCadastrar = document.querySelector("#btn_Cadastrar");
var inp_nome = document.getElementById("inp_nome");
var inp_CPF = document.getElementById("CPF");
var inp_CNPJ = document.getElementById("CNPJ");

function Validar_Campos(){
    // Tipo de validação se o CPF for selecionado
    if(rb_cpf.checked==true){
        if(inp_CPF.value!=""){
            var arraycpf = inp_CPF.value.split("").map(Number);
            alert(Validador_CPF(arraycpf));
        }
    }
    //Tipo de validação se o CNPJ for selecionado
    else if (rb_cnpj.checked==true){
        if(inp_CNPJ.value!=""){
            var arraycnpj = inp_CNPJ.value.split("").map(Number);
            alert(Validador_CNPJ(arraycnpj));
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

    if((dv1 == arraycpf[9])&&(dv2 == arraycpf[10])){
        return true;
    }
    else{
        return false;
    }
}

function Validador_CNPJ(arraycnpj){
    let i,j,soma,dv1,dv2,resto;

    // Calculando Digito Verificador 1
    i,soma=0;
    j = 13;
    for(i=0; i<12; i++){
        soma+=arraycnpj[i]*j;
        j = j-1;
    }

    resto = soma % 14;

    if(resto < 2){
        dv1 = 0;
    }
    else{
        dv1 = 14 - resto;
    }

     //Calcular Digito verificador 2

     soma = 0;
     j = 14;
 
     for(i=0; i<13; i++){
         soma+=arraycnpj[i]*j;
         j = j-1;
     }

     resto = soma % 14;

     if(resto < 2){
         dv2 = 0;
     }
     else{
         dv2 = 14 - resto;
     }
 
     if((dv1 == arraycnpj[12])&&(dv2 == arraycnpj[13])){
         return true;
     }
     else{
         return false;
     }
 

}