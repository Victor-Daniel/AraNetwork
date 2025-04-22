var rb_cpf = document.querySelector("#Pfisica");
var rb_cnpj = document.querySelector("#Pjuridica");
var btnCadastrar = document.querySelector("#btn_Cadastrar");
var inp_nome = document.getElementById("inp_nome");

function Validar_Campos(){
    // Tipo de validação se o CPF for selecionado
    if(rb_cpf.checked==true){
        if(inp_nome.value!=""){
            alert(inp_nome.value);
        }
    }
    //Tipo de validação se o CNPJ for selecionado
    else if (rb_cnpj.checked==true){

    }
}

btnCadastrar.addEventListener("click",function e(){
    Validar_Campos();
});