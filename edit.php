<?php
    include_once('conexao.php');
    
    
    if(!empty($_GET['id_cs']))
    {
        $id = $_GET['id_cs'];
        $sqlSelect = "SELECT * FROM tb_controle_servico WHERE id_cs=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                
                $data = $user_data['dt_cs'];
                $user = $user_data['usr_cs'];
                $ser = $user_data['ser_cs'];
                $cc = $user_data['cc_cs'];
                $emp = $user_data['emp_cs'];
                $os = $user_data['id_cs'];
                $nf = $user_data['nf_cs'];
                $vl = $user_data['vl_cs'];
                $dt_ex = $user_data['dt_ex_cs'];              
                $hi = $user_data['hi_cs'];              
                $hf = $user_data['hf_cs'];              
                $st = $user_data['st_cs'];              
                $obs = $user_data['obs_cs'];              
                $lib = $user_data['lib_cs'];              
                $us = $user_data['us_cs'];              
                
            }
        }
        else
        {
            header('Location: consulta_cs.php');
        }
    }
    else
    {
        header('Location: consulta_cs.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Controle de Serviço</title>
    
    <style>
        body{
            /*background: linear-gradient(to right, rgb(235, 141, 41), rgb(146, 77, 3));*/
            background-color: orange;
            color: white;
            text-align: left;
        }
             
        .box{
            color: white;
            position: relative;
            top: 50%;
            left: 25%;
            /*transform: translate(0%,0%);*/
            background-color: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 15px;
            width: 50%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }/*
        .inputBox{
            position: relative;   
                        
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
            
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }*/

        .input-box,
        .input-box1{
            padding: 0px 0px 0px 20px; 
            /*display: flex;
            align-items: center;
            justify-content: left;*/
        }

        .input-box1 >input{
            width: 80%;

        }

        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MALVASUL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="d-flex">
            <a href="consulta_cs.php" class="btn btn-danger me-5" >Voltar</a>
                <a href="index.html" class="btn btn-danger me-5">Sair</a>
            </div>
        </nav>
        <br>

            
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Serviços</b></legend>
                <br>
                <div class="input-box">
                        
                        <input id="name" type="name" name="os_cs" value="<?php echo $os;?>" readonly="readonly" >
                        <label for="name">Ordem de Serviço</label>
                </div>
                <div class="input-box">
                        
                        <input id="name" type="name" name="dt_cs" value="<?php echo $data;?>" readonly="readonly">
                        <label for="name">Data</label>
                </div>
                
                <div class="input-box">
                        
                        <input id="name" type="name" name="usr_cs" value="<?php echo $user;?>" readonly="readonly">
                        <label for="name">Solicitamte</label>
                </div>
                
                <div class="input-box">
                        
                        <input id="name" type="name" name="ser_cs" value="<?php echo $ser;?>" readonly="readonly" >
                        <label for="name">Serviço</label>
                </div>
                
                <div class="input-box">
                        
                        <input id="name" type="name" name="cc_cs" value="<?php echo $cc;?>" readonly="readonly" >
                        <label for="name">Centro de Custo</label>
                </div>
                
                
                <br>
                <div class="input-box">
                        
                        <input id="name" type="name" name="emp_cs" value="<?php echo $emp;?>" >
                        <label for="name">Empresa Solicitada</label>
                </div>
                <br>
                <!--
                <div class="input-box">
                        
                        <input id="name" type="name" name="nf_cs" value="<?php echo $nf;?>"  >
                        <label for="name">Nota Fiscal</label>
                </div>
                <br>
                <div class="input-box">
                        
                        <input id="name" type="name" name="vl_cs" value="<?php echo $vl;?>" >
                        <label for="name">Valor</label>
                </div>
                <br>
                -->
                <div class="input-box">
                        
                        <input id="name" type="date" name="dt_ex_cs" value="<?php echo $dt_ex;?>" >
                        <label for="name">Data Trabalho</label>
                </div>
                <br>
                <!--
                <div class="input-box">
                        
                        <input id="name" type="time" name="hi_cs" value="<?php echo $hi;?>" >
                        <label for="name">Inicio</label>
                </div>
                <br>
                <div class="input-box">
                        
                        <input id="name" type="time" name="hf_cs" value="<?php echo $hf;?>" >
                        <label for="name">Final</label>
                </div>
                <br>
                -->
                <div class="input-box1">
                        
                        <input id="name" type="text" name="obs_cs" value="<?php echo $obs;?>" >
                        <label for="name">Inf. Serviço</label>
                </div>
                <br>
                <div class="input-box">
                        
                        <!--<input id="name" type="name" name="obs" value="<?php echo $obs;?>" required>-->
                        <select id="name" type="name" name="st_cs" class="select-loja" value="<?php echo $st;?>">
                           <option value="<?php echo $st;?>"><?php echo $st;?></option>
                           <option value="Orçamento">Orçamento</option>
                           <option value="Autorizado">Autorizado</option>
                           <option value="Finalizado">Finalizado</option>
                       </select>
                       <label for="name">Status</label>
                </div>
                <br>
                

				<input type="hidden" name="id_cs" value=<?php echo $id;?>>
                <input type="submit" value="ALTERAR" name="update" id="submit">
                
            </fieldset>
        </form>
    </div>
</body>
</html>