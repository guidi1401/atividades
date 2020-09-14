<!DOCTYPE html>
<html>
    <head>
        <title>Atividade - Requisição para a API VIACEP</title>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                function limpa_form(){
                    $("#endereco").val("");
                    $("#numero").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#estado").val("");
                }
                
                $("#cep").blur(function(){
                    var cep = $(this).val().replace(/\D/g,'');
                    if(cep!=""){
                        var validacep = /^[0-9]{8}$/;
                        if(validacep.test(cep)){
                            $("#endereco").val("...");
                            $("#numero").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#estado").val("...");
                            $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(d){
                                if(!("erro" in d)){
                                    $("#endereco").val(d.logradouro);
                                    $("#numero").val(d.numero);
                                    $("#bairro").val(d.bairro);
                                    $("#cidade").val(d.localidade);
                                    $("#estado").val(d.uf);
                                    $("#numero").focus();
                                }else{
                                    limpa_form();
                                    alert("CEP não encontrado.");
                                }
                            });
                        }else{
                            limpa_form();
                            alert("Formato de CEP inválido.");
                        }
                    }else{
                        limpa_form();
                    }
                });
            });
        </script>
    </head>
<body>
    <form method="get">
        <input type="number" name="cep" id="cep" placeholder="CEP..."/>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço..."/>
        <input type="number" name="numero" id="numero" placeholder="Número..."/>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro..."/>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade..."/>
        <input type="text" name="estado" id="estado" placeholder="Estado..."/>
    </form>
</body>
</html>