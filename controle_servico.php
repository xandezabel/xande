<?php
    session_start();
    include_once("conexao.php");
    // print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: login_usr.php');
    }
    $logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql= "SELECT * FROM cd_fornecedor WHERE id_forn LIKE '%$data%' or cd_forn LIKE '%$data%' or dcr_forn LIKE '%$data%' ORDER BY cd_forn ASC";
    }
   // else
    //{
    //    $sql = "SELECT * FROM cd_fornecedor ORDER BY cd_forn DESC";
    //}
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta http-equiv="content-language" content="pt-br" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/icon/favicon.ico">
    <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <title>Controle de Serviços</title>
</head>

<body>


        
        <div class="form">
            <form method="POST" action="controle_servico_conf.php">
                <div class="form-header">
                <div class="form-login-top">
                    <img class="img-login" src="img/logohipperr.png" alt="">
                    <h2 class="title">Controle de Serviços</h2>
                    <p></p>
                   
                        

                    </div>

                    <div>      
                        <?php
                        echo "<h2>Bem Vindo - <u>$logado</u> !!</h2>";
                        ?>
                    </div>              
                

                
                    <div class="input-group">

                    <div class="">
                        <label for="date">Data da Solicitação</label>
                        <input id="data" type="date" name="dt_cs" value='<?php echo date("Y-m-d"); ?>' > 
                                              
                    </div>        
                
                    <div class="input-box">
                        <label for="name">Solicitante</label>
                        <!--<input id="name" type="name" name="usr_cs" placeholder="Digite o Solicitante" required>-->
                        <select id="name" type="name" name="usr_cs" class="select-loja" >
                           <option value="Solicitante não Informado">Selecione o Solicitante </option>
                           <option value="Gerente Geral">- Gerente Geral</option>
                           <option value="Gerente Loja 1">- Gerente Loja Bairro São Paulo</option>
                           <option value="Gerente Loja 2">- Gerente Loja Centro</option> 
                           <option value="Gerente Loja 3">- Gerente Loja Meia Praia</option>
                                                  
                        </select>
                    </div>

                   <div class="input-box">
                        <label for="name">Selecione o Serviço</label>
                       
                       <select id="name" type="name" name="ser_cs" class="select-loja" >
                           <option value="Serviço não Informado"> Selecione o Serviço </option>
                           <option value="1 - Manutenção">1 - Manutenção </option>
                           <option value="2 - Outro">2 - Outro </option>                        
                       </select>
                    </div> 
                  
                    <div class="input-box">
                        <label for="name">Selecione o Centro de Custo</label>
                       
                       <select id="name" type="name" name="cc_cs" class="select-loja" >
                           <option value="Centro de Custo não Informado">Selecione o Setor </option>
                           <option value="1 - Loja">1 - Loja</option>
                           <option value="2 - Frente de Loja">2 - Frente de Loja</option>
                           <option value="3 - Acougue">3 - Açougue</option> 
                           <option value="4 - Padaria">4 - Padaria</option>
                           <option value="5 - Deposito">5 - Deposito</option>                       
                       </select>
                    </div> 
                    
                <!--
                    <div class="input-box">
                        <label for="name">Empresa Prestadora do Serviço</label>
                        <input id="name" type="name" name="emp_cs" placeholder="Digite Nome da Empresa" required>
                    </div>
                
                    <div class="input-box">
                        <label for="name">Ordem de Serviço</label>
                        <input id="name" type="name" name="os_cs" placeholder=" OS " required>
                    </div>

                    
                    <div class="input-box">
                        <label for="name">Nota Fiscal</label>
                        <input id="name" type="name" name="nf_cs" placeholder="Digite NF">
                    </div>                            

                    <div class="input-box">
                        <label for="name">Valor</label>
                        <input id="name" type="name" name="vl_cs" placeholder="Digite o valor">
                    </div>
                   
                    

                    <div class="input-box">
                        <label for="date">Data execução</label>
                        <input id="date" type="date" name="dt_ex_cs" >
                    </div>

                    <div class="input-box">
                        <label for="name">Horario Inicial</label>
                        <input id="name" type="name" name="hi_cs" >
                    </div>
                    
                    <div class="input-box">
                        <label for="name">Horario Final</label>
                        <input id="name" type="name" name="hf_cs" >
                    </div>
                    -->
                    <!--
                    <div class="input-box">
                        <label for="date">Vencimento 5</label>
                        <input id="date" type="date" name="dt_venc5" >
                    </div>
                    
                    <div class="input-box">
                        <label for="date">Vencimento 6</label>
                        <input id="date" type="date" name="dt_venc6" >
                    </div>
                            -->
                    
                    <div class="input-box">
                        <label for="name">Prioridade</label> 
                        <!--<input id="name" type="name" name="usr_conf" placeholder="Digite o usuario" required>-->
                        <select id="name" type="name" name="st_cs" class="select-loja">
                           <option value="Status não Informado"> Status </option>
                           <option value="Baixa"> &nbsp;&nbsp; Baixa </option>
                           <option value="Média"> &nbsp;&nbsp; Média </option>
                           <option value="Alta"> &nbsp;&nbsp; Alta </option>
                           
                       </select>
                    </div> 

                    <div class="input-box">
                        <label for="name">Descrição do Serviço</label>
                        <input id="name" type="name" name="obs_cs" placeholder="Digite o serviço a ser realizado!" required >
                    </div>

                    <div class="input-box-user">
                        <label for="name">Usuário</label>
                        <input id="name" type="name" name="us_cs" value='<?php echo ($logado); ?>' readonly="readonly" > 
                                              
                    </div>    

                   

                    </div>
                
                    <div class="continue-button">
                    <button class="cadastro-button"> Cadastrar </button>
                    
                    </div>

                    <div class="continue-button">
                        <button ><a href="consulta_cs.php">Consulta</a></button>
                        <button ><a href="index.html">Sair</a></button>
                        
                        
                    </div>

                </div>
            </form>

            
            
                    

        </div>
    
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'controle_servico.php?search='+search.value;
    }

    


            $(function () {
                $("#pesquisar").autocomplete({
                    source: 'proc_pesq_msg.php'
                });
            });
        </script>

</html>