<?php
    session_start();
    include_once('conexao.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['nome_usr']) == true) and (!isset($_SESSION['senha_usr']) == true))
    {
        unset($_SESSION['nome_usr']);
        unset($_SESSION['senha_usr']);
        header('Location: login_usr.php');
    }
    $logado = $_SESSION['nome_usr'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql= "SELECT * FROM tb_controle_servico WHERE id_cs LIKE '%$data%' or dt_cs LIKE '%$data%' or usr_cs LIKE '%$data%' or ser_cs LIKE '%$data%' or cc_cs LIKE '%$data%' or emp_cs LIKE '%$data%' or os_cs LIKE '%$data%' or nf_cs LIKE '%$data%' or vl_cs LIKE '%$data%'  or dt_ex_cs LIKE '%$data%' or hi_cs LIKE '%$data%' or hf_cs LIKE '%$data%' or st_cs LIKE '%$data%' or obs_cs LIKE '%$data%' or lib_cs LIKE '%$data%' ORDER BY id_cs DESC";
        //SELECT  FROM `tb_notas` WHERE `id_nf`, `lj_nf`, `n_nf`, `for_nf`, `dt_nf`, `vt_nf`, `dt_venc`, `dt_venc2`, `dt_venc3`, `dt_venc4`, `dt_venc5`, `dt_venc6`, `usr_conf`, `obs`, `lib_nf`, `dt_reg`
        // SELECT `id_cs`, `dt_cs`, `usr_cs`, `ser_cs`, `cc_cs`, `emp_cs`, `os_cs`, `nf_cs`, `vl_cs`, `dt_ex_cs`, `hi_cs`, `hf_cs`, `st_cs`, `obs_cs`, `lib_cs`, `dtr_cs` FROM `tb_controle_servico` WHERE 1
    }
    else
    {
        $sql = "SELECT * FROM tb_controle_servico ORDER BY id_cs DESC";
    }
    $result = $conexao->query($sql);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Consulta e Edita Serviços </title>
    <style>
        body{
            /*background: linear-gradient(to right, rgb(235, 141, 41), rgb(146, 77, 3));*/
            background-color: orange;
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MALVASUL - Consulta e Edita Serviços</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="controle_servico.php" class="btn btn-danger me-5" >Voltar</a>
            <a href="index.html" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-4">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Nº OS</th>
                    <th scope="col">Data</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Centro Custo</th>
                    <th scope="col">Empresa</th>                                        
                    <th scope="col">Nota</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data Execução</th>
                    <th scope="col">Hora Inicio</th>
                    <th scope="col">Hora Final</th>
                    <th scope="col">Informações</th>
                    <th scope="col">Status</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id_cs']."</td>";
                        echo "<td>".$user_data['dt_cs']."</td>";
                        echo "<td>".$user_data['usr_cs']."</td>";
                        echo "<td>".$user_data['ser_cs']."</td>";
                        echo "<td>".$user_data['cc_cs']."</td>";
                        echo "<td>".$user_data['emp_cs']."</td>";                        
                        echo "<td>".$user_data['nf_cs']."</td>";                        
                        echo "<td>".$user_data['vl_cs']."</td>";
                        echo "<td>".$user_data['dt_ex_cs']."</td>";
                        echo "<td>".$user_data['hi_cs']."</td>"; 
                        echo "<td>".$user_data['hf_cs']."</td>"; 
                        echo "<td>".$user_data['obs_cs']."</td>"; 
                        echo "<td>".$user_data['st_cs']."</td>"; 
                        echo "<td>".$user_data["us_cs"]."</td>";                          
                        echo "<td>                        
                            <a class='btn btn-sm btn-primary' href='edit.php?id_cs=$user_data[id_cs]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-warning' href='edit_fin.php?id_cs=$user_data[id_cs]' title='Editar Gerencia'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?id_cs=$user_data[id_cs]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
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
        window.location = 'consulta_cs.php?search='+search.value;
    }

    

</script>
</html>