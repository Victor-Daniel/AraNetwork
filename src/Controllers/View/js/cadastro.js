
// Criando ativação e bloqueio de campos por radio button

var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var inp_CNPJ =  document.getElementById("CNPJ");
var lb_CNPJ = document.getElementById("lb_CNPJ");
var inp_CPF = document.getElementById("CPF");
var lb_CPF = document.getElementById("lb_CPF");
var inp_RG = document.getElementById("RG");
var lb_RG = document.getElementById("lb_RG");
var inp_cidade = document.getElementById("cidade");
var inp_cel = document.getElementById("cel");
var inp_data = document.getElementById("data");
var lb_data = document.getElementById("lb_data");
var inp_user = document.getElementById("user");
var inp_nome = document.getElementById("nome");
var inp_email = document.getElementById("email");
var inp_endereco = document.getElementById("endereco");
var inp_bairro = document.getElementById("bairro");
var inp_numero = document.getElementById("numero");
var inp_complemento = document.getElementById("complemento");
var inp_uf = document.getElementById("UF");
var inp_cep = document.getElementById("CEP");

document.addEventListener("DOMContentLoaded",function e(){
    rb_cpf.checked=true;
    if(rb_cpf.checked==true){
        inp_CNPJ.disabled=true;
        inp_CNPJ.style.borderColor="#cecece";
        lb_CNPJ.style.color="#cecece";

        inp_RG.disabled=false;
        inp_RG.style.borderColor="#2F4F4F";
        lb_RG.style.color="#2F4F4F";  

        inp_CPF.disabled=false;
        inp_CPF.style.borderColor="#2F4F4F";
        lb_CPF.style.color="#2F4F4F";

        inp_data.disabled=false;
        inp_data.style.borderColor="#2F4F4F";
        lb_data.style.color="#2F4F4F";
    }
});

rb_cpf.addEventListener("click",function e(){
    inp_CNPJ.disabled=true;
    inp_CNPJ.style.borderColor="#cecece";
    lb_CNPJ.style.color="#cecece";

    inp_CPF.disabled=false;
    inp_CPF.style.borderColor="#2F4F4F";
    lb_CPF.style.color="#2F4F4F";

    inp_RG.disabled=false;
    inp_RG.style.borderColor="#2F4F4F";
    lb_RG.style.color="#2F4F4F";
    inp_CNPJ.value="";

    inp_data.value="";
    inp_data.disabled=false;
    inp_data.style.borderColor="#2F4F4F";
    lb_data.style.color="#2F4F4F";
});

rb_cnpj.addEventListener("click",function e(){
    inp_CNPJ.disabled=false;
    inp_CNPJ.style.borderColor="#2F4F4F";
    lb_CNPJ.style.color="#2F4F4F";

    inp_CPF.disabled=true;
    inp_CPF.style.borderColor="#cecece";
    lb_CPF.style.color="#cecece";

    inp_RG.disabled=true;
    inp_RG.style.borderColor="#cecece";
    lb_RG.style.color="#cecece";

    inp_CPF.value="";
    inp_RG.value="";

    inp_data.value="";
    inp_data.disabled=true;
    inp_data.style.borderColor="#cecece";
    lb_data.style.color="#cecece";
});

//Tratando o Campo de CPF e CNPJ

inp_CPF.addEventListener("input", function e(){
    //Remove qualquer caractere que não seja numérico
    this.value = this.value.replace(/\D/g,"");

    //Limita o campo a 11 caracteres
    if(this.value.length>11){
        this.value=this.value.substring(0,11);
    }

});

inp_CNPJ.addEventListener("input",function e(){
       //Remove qualquer caractere que não seja numérico
       this.value = this.value.replace(/\D/g,"");

       //Limita o campo a 14 caracteres
       if(this.value.length>14){
           this.value=this.value.substring(0,14);
       }
});

//Impedindo a digitação de caracteres não autorizados.
inp_cidade.addEventListener("keypress", function e(element){
    const permitido = /^[\p{L}\p{N}\s]+$/u;

    if(!permitido.test(element.key)){
        element.preventDefault();
    }
});

inp_cel.addEventListener("keypress",function e(element){
    const permitido = /[0-9]/;

    if(!permitido.test(element.key)){
        element.preventDefault();
    }

});

inp_RG.addEventListener("keypress", function e(element){
    const permitido = /[0-9]/;

    if(!permitido.test(element.key)){
        element.preventDefault();
    }
});

inp_data.addEventListener("keypress", function e(element){
    const permitido = /[0-9]/; // apenas números 
      if (!permitido.test(element.key)) {
        element.preventDefault();
      }
});

inp_user.addEventListener("keypress", function e(element){
    const permitido = /^[\p{L}\p{N}\s]+$/u;

    if(!permitido.test(element.key)){
        element.preventDefault();
    }
});

inp_nome.addEventListener("keypress", function e(element){
    const regex = /^[\p{L}\p{N}\s]+$/u;

    if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_email.addEventListener("keypress", function(element){
    const regex = /^[a-zA-Z0-9.@]+$/;
    if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_endereco.addEventListener("keypress", function(element){
    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
     if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_bairro.addEventListener("keypress", function(element){
    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
    if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_numero.addEventListener("keypress", function(element){
     const regex = /[0-9]/;
    if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_complemento.addEventListener("keypress", function(element){
     const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
    if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_uf.addEventListener("keypress", function(element){
    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
    if(!regex.test(element.key)){
        element.preventDefault();
    }
});

inp_cep.addEventListener("keypress", function(element){
    const regex  = /[0-9]/;
    if(!regex.test(element.key)){
        element.preventDefault();
    }
});