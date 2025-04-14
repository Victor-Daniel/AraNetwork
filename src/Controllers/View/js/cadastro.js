var btnCadastrar = document.querySelector("#btn_Cadastrar");
var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var inp_CNPJ =  document.getElementById("CNPJ");
var lb_CNPJ = document.getElementById("lb_CNPJ");

document.addEventListener("DOMContentLoaded",function e(){
    rb_cpf.checked=true;
    if(rb_cpf.checked==true){
        inp_CNPJ.disabled=true;
        inp_CNPJ.style.borderColor="#cececece";
        lb_CNPJ.style.color="#cecece";   
    }
});

rb_cpf.addEventListener("click",function e(){
    inp_CNPJ.disabled=true;
    inp_CNPJ.style.borderColor="#cececece";
    lb_CNPJ.style.color="#cecece";
});

btnCadastrar.addEventListener("click",function e(){

});

