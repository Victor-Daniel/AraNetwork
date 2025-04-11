var btnCadastrar = document.querySelector("#btn_Cadastrar");
var cb_cpf = document.querySelector("#Pfisica");
var cb_cnpj = document.querySelector("#Pjuridica");
var Inp_RG = document.getElementById("RG");
var Inp_CPF =  document.getElementById("CPF");
var Inp_CNPJ =  document.getElementById("CNPJ");

btnCadastrar.addEventListener("click",function e(){
    if(cb_cpf.checked){
        alert("teste");
    }
    else if(cb_cnpj.checked){
    }
});

