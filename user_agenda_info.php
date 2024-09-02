<!--<?php
    
    if(!empty($_GET['id'])){
        include('php/protect.php');
        include('conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        $id = $_GET['id'];

        $sql = "SELECT * FROM agenda WHERE id_agenda=$id";
        $result = mysqli_query($mysql->con, $sql);

        if ($result -> num_rows > 0) {
            $agenda = mysqli_fetch_assoc($result);

        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Este id não existe');window.location.href='javascript:history.back()';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('ID do usuário não encontrado');window.location.href='javascript:history.back()';</script>";
    }
    
?>-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe da palestra</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleII.css"/>
    <link rel="stylesheet" href="css/usuarios.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="navigattion">
        <ul>
            <li>
                <a href="adm_inicio.php">
                    <span class="icon"><img src="image/logo.png"></span>
                    <span class="title"><b>Cultura da Paz</b></span>

                </a>
            </li>
            <li class="list">
                <a href="adm_usuarios.php">
                    <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                    <span class="title">Usuários</span>
                </a>
            </li>
            <li class="list active">
                <a href="adm_pendencias.php">
                    <span class="icon"> <ion-icon name="time-outline"></ion-icon> </span>
                    <span class="title">Pendências</span>
                </a>
            </li>
            <li class="list">
                <a href="adm_agenda.php">
                    <span class="icon"> <ion-icon name="calendar-clear-outline"></ion-icon> </span>
                    <span class="title">Agenda</span>
                </a>
            </li>
            <li class="list">
                <a href="php/logout.php">
                    <span class="icon"> <ion-icon name="log-out-outline"></ion-icon> </span>
                    <span class="title"> Logout </span>
                </a>
            </li>
        </ul>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
    <script>
        const list= document.querySelectorAll('.list');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
         item.addEventListener('mouseover',activeLink));
    </script>
    <div class="content-edit">
        <div class="edit-user">
            <a href="user_agenda.php" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            <h2>Detalhes da palestra</h2>
            <p> Veja os principais detalhes da sua palestra</p>

            <div class="justify-content">
                <div class="form-edit">
                    <div class="edit-top">
                        <h3>Palestra do dia: <?php echo $agenda['dataselecionada']; ?></h3>
                    </div><br>
                    <form action="#" method="post" class="form-edit-perfil">

                        <div class="justify-content">
                            <div style="width: 100%;">
                                <label>Nome do evento</label>
                                <input name="nome" type="text" value="<?php echo $agenda['nomeevento']; ?>" readonly><br>
                            </div>
                            <div style="margin-left: 10px;margin-right: 15px; width: 300px;">
                                <label>Horário</label>
                                <input name="horario" type="int" value="<?php echo $agenda['horario']; ?>" readonly><br>
                            </div>
                        </div>

                        <div class="justify-content">
                            <div style="width: 100%;">
                                <label>Endereço</label>
                                <input name="endereco" type="text" value="<?php echo $agenda['endereco']; ?>" readonly><br>
                            </div>
                            <div style="margin-left: 10px;margin-right: 15px; width: 300px;">
                                <label>Número</label>
                                <input name="numero" type="int" value="<?php echo $agenda['numero']; ?>" readonly><br>
                            </div>
                        </div>

                        <label>Ponto de referencia</label>
                        <input name="referencia" type="text" value="<?php echo $agenda['referencia']; ?> "readonly><br>

                        <label>Telefone</label>
                        <input name="text" type="text" value="<?php echo $agenda['telefone']; ?>" readonly><br>

                        <label>Descrição</label>
                        <textarea name="descricao" style="resize: none; height: 70px;" readonly><?php echo $agenda['descricao']; ?></textarea>

                    </form>
                </div>
                <div>
                    <img src="image/info-detalhes.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>