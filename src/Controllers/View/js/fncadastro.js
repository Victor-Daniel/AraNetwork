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
var inp_rg = document.getElementById("RG");
var tel_tratado;
var cel_tratado;
var inp_endereco = document.getElementById("endereco");
var inp_bairro = document.getElementById("bairro");
var inp_complemento = document.getElementById("complemento");
var inp_numero = document.getElementById("numero");
var inp_cep = document.getElementById("CEP");
var inp_uf = document.getElementById("UF");
//---------------------------------------------------------------------------------------------------------

//Variáveis p/ dados tratados.
var safe_cpf,safe_cnpj,url,tel_tratado,cel_tratado,Dados;
tel_tratado = "";
let DadosJson;


function Validar_Campos(){
     //Verificar se os resultados são verdadeiros, se for, começará a criação do json para envio dos dados.
        var result_nome = Validador_Nome(inp_nome.value);
        var result_user = Validador_Usuario(inp_user.value);
        var result_pwd = Validador_Senha(inp_pwd.value);
        var result_email = Validador_Email(inp_email.value);
        var result_tel = Validador_Tel(inp_tel.value);
        var result_cel = Validador_Celular(inp_cel.value);
        var result_data = Validador_Data(inp_data.value);
        var result_rg = Validador_RG(inp_rg.value);
        var result_endereco = Validador_Endereco(inp_endereco.value);
        var result_bairro = Validador_Bairro(inp_bairro.value);
        var result_complemento = Validador_Complemento(inp_complemento.value);
        var result_numero = Validador_Numero(inp_numero.value);
        var result_cep = Validador_Cep(inp_cep.value);
        var result_uf = Validador_UF(inp_uf.value);


    // Tipo de validação se o CPF for selecionado
    if(rb_cpf.checked==true){
        if(inp_CPF.value!=""){

            var arraycpf = inp_CPF.value.split("").map(Number);
            safe_cpf = Validador_CPF(arraycpf);

            // Após a Validação do CPF
            if(safe_cpf==false){
                alert("CPF informado não é válido!");
            }
            else{
                if((inp_nome.value=="")||(inp_user.value=="")||(inp_pwd.value == "")||(inp_email.value=="")||(inp_cel.value=="")||(inp_tel=="")||(inp_data.value=="")||
                    (inp_endereco.value=="")|| (inp_rg.value=="")||(inp_bairro.value=="")||(inp_complemento.value=="")||(inp_numero.value=="")||(inp_uf.value=="")||(inp_cep.value=="")){
                        alert("Preencha todos campos obrigatórios corretamente!");

                }
                else{
                        if((result_nome==true)&&(result_user==true)&&(result_pwd==true)&&(result_rg==true)&&(result_email==true)&&(result_tel==true)&&(result_cel==true)&&(result_data==true)&&
                        (result_endereco==true)&&(result_bairro==true)&&(result_complemento==true)&&(result_numero==true)&&(result_cep==true)&&(result_uf==true)){

                            //Tratando os dados para envio
                            url = "http://"+config_API_Cadastro.API_CONECT;
                            var DataAjustada = Formatacao_Data(inp_data.value);

                            Dados = {
                                nome: inp_nome.value,
                                usuario: inp_user.value,
                                passwd: inp_pwd.value,
                                email: inp_email.value,
                                cpf : inp_CPF.value,
                                rg : inp_rg.value,
                                telefone: tel_tratado,
                                celular: cel_tratado,
                                data : DataAjustada,
                                endereco : inp_endereco.value,
                                numero: inp_numero.value,
                                bairro: inp_bairro.value,
                                complemento: inp_complemento.value,
                                uf: inp_uf.value,
                                cep: inp_cep.value    
                            };
                
                            //Criando o json para envio dos dados.
                            DadosJson = JSON.stringify(Dados);
                            fetch(url,{
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: DadosJson
                            }).then(response=>response.json()).then(data=>{
                                console.log(data);
                            }).catch(error=>{
                                console.log("Erro ao enviar os Dados!", error);
                            });
                        }
                        else{
                            alert("Erro ao validar um ou mais campos!");
                        }
                    } 
                }
        }
        else{
            alert("Preencha correntamente o CPF!");
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
            else{
                //Verificação se os outros campos estão vazios
                if((inp_nome.value=="")||(inp_user.value=="")||(inp_pwd.value == "")||(inp_email.value=="")||(inp_cel.value=="")||
                    (inp_endereco.value=="")||(inp_bairro.value=="")||(inp_complemento.value=="")||(inp_numero.value=="")||(inp_uf.value=="")||(inp_cep.value=="")){
                    alert("Preencha todos campos obrigatórios corretamente!");

                }
                else{
                    if((result_nome==true)&&(result_user==true)&&(result_pwd==true)&&(result_email==true)&&(result_tel==true||inp_tel.value=="")&&(result_cel==true)&&
                    (result_endereco==true)&&(result_bairro==true)&&(result_complemento==true)&&(result_numero==true)&&(result_cep==true)&&(result_uf==true)){

                        //Tratando os dados para envio
                        url = "http://"+config_API_Cadastro.API_CONECT;
                        Dados = {
                                nome: inp_nome.value,
                                usuario: inp_user.value,
                                passwd: inp_pwd.value,
                                email: inp_email.value,
                                cnpj: inp_CNPJ.value,
                                telefone: inp_tel.value,
                                celular: inp_cel.value,
                                endereco: inp_endereco.value,
                                bairro: inp_bairro.value,
                                complemento: inp_complemento.value,
                                numero: inp_numero.value,
                                uf: inp_uf.value,
                                cep: inp_cep.value
                            };
                        //Criando o json para envio dos dados.
                        DadosJson = JSON.stringify(Dados);
                        fetch(url,{
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: DadosJson
                        }).then(response=>response.json()).then(data=>{
                            console.log(data);
                        }).catch(error=>{
                            console.log("Erro ao enviar os Dados!", error);
                        });
                    }
                    else{
                        alert("Erro ao validar um ou mais campos!");
                    }
                }   
            }
        }
        else{
            alert("Informe um CNPJ válido!");
        }

    }
    
}

btnCadastrar.addEventListener("click",function e(){
    Validar_Campos();
});


//Criando os validadores dos campos do cadastro.

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

    const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s\-]+$/;
    if(regex.test(nome)){
        return true;
    }
    else{
        alert("Nome foi digitado de maneira incorreta!")
        return false;
    }
}

function Validador_Usuario(user){

    const regex = /^[A-Za-z0-9À-ÖØ-öø-ÿ\s\-]+$/;
    if(regex.test(user) == true){
        return true;
    }
    else{
        alert("Nome de usuário inválido!");
        return false;
    }
}

function Validador_Senha(pwd){

    if(pwd.length < 8){
        alert("Esta senha é fraca. Favor digitar outra senha!")
        return false;
    }
    else{
        if(pwd.length >=8){
            return true;
        }
    }
}

function Validador_Email(email){

    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(regex.test(email)==true){
        return true;
    }
    else{
        alert("Email inválido!");
        return false;
    }
    
}

function Validador_Tel(tel){

    let regex = /^[0-9]*$/;

    if(regex.test(tel)){
        if(tel.length==10){
            let ddd = tel.slice(0,2);
            let p_quarteto = tel.slice(2,6);
            let s_quarteto = tel.slice(6,10);
            tel_tratado = "("+ddd+")"+p_quarteto+"-"+s_quarteto;
            return true;
        }
        else if(tel.length==0){
            tel_tratado = "";
            return true;
        }
    }
    else{
        alert("Telefone inválido!");
        return false;
    }

}

function Validador_Celular(cel){

     let regex = /^[0-9]+$/;

     if(regex.test(cel)){
        if(cel.length==11){
            let ddd = cel.slice(0,2);
            let p_quarteto = cel.slice(2,7);
            let s_quarteto = cel.slice(7,11);
            cel_tratado= "("+ddd+")"+p_quarteto+"-"+s_quarteto;
            return true;
        }
        else{
            alert("Celular inválido!");
        return false;
        }
     }
     else{
        alert("O celular foi digitado com formato inválido!");
        return false;
     }
}

function Validador_Data(data){
    if(rb_cpf.checked==true){
        const regex = /^\d{2}-\d{2}-\d{4}$/; 

        const NovaData = data.substring(0, 2) + "-" + data.substring(2, 4) + "-" + data.substring(4);

        if(regex.test(NovaData) == true){
            return true;
        }
        else{
            alert("Data está incorreta!");
            return false;
        }
    }


}

function Validador_Endereco(endereco){

    var regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

   if(regex.test(endereco)){
        return true;
    }
    else{
        return false;
    }
    
}

function Validador_Bairro(bairro){

    var regex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

   if(regex.test(bairro)){
        return true;
    }
    else{
        return false;
    }
}

function Validador_Complemento(complemento){
    const regex = /^[A-Za-zÀ-Ö0-9Ø-öø-ÿ\s]+$/;
    if(regex.test(complemento)){
        return true;
    }
    else{
        return false;
    }
}

function Validador_Numero(numero){
     const regex = /^[0-9]+$/;
     
     if(regex.test(numero)){
        return true;
     }
     else{
        return false;
     }
}

function Validador_Cep(cep){
    const regex = /^[0-9]+$/;

    if(regex.test(cep)){
        return true;
    }
    else{
        return false;
    }
}   

function Validador_UF(uf){
    var regex = /^[A-Za-z]+$/;
    if(regex.test(uf)){
        inp_uf.value = uf.toUpperCase();
        return true;
    }
    else{
        return false;
    }
}

function Validador_RG(RG){
    let regex = /^[0-9]*$/;
    if(regex.test(RG)){
        return true;
    }
    else{
        return false;
    }
}

// Formatação da data 

function Formatacao_Data(data){
    const NovaData = data.substring(0, 2) + "-" + data.substring(2, 4) + "-" + data.substring(4);
    return NovaData;

}