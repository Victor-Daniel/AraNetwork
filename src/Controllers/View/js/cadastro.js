var btnCadastrar = document.querySelector("#btn_Cadastrar");
var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var inp_CNPJ =  document.getElementById("CNPJ");
var lb_CNPJ = document.getElementById("lb_CNPJ");
var inp_CPF = document.getElementById("CPF");
var lb_CPF = document.getElementById("lb_CPF");
var inp_RG = document.getElementById("RG");
var lb_RG = document.getElementById("lb_RG");

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

});


btnCadastrar.addEventListener("click",function e(){

});

