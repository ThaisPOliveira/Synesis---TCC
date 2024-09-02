<!--<?php
    include ('php/protect.php');
    include('conexao/conexao.php');
    
    $mysql = new BancodeDados();
    $mysql->conecta();

    // usuarios
    $sqlusuarios = "SELECT * FROM usuario WHERE nivel = 'usuario'";
    $result = mysqli_query($mysql->con, $sqlusuarios);

    if ($result) {
        $totalUsuario = mysqli_num_rows($result);

        $totalUsuarios = sprintf("%02d", $totalUsuario);
        $pusuarios = $totalUsuarios;
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($mysql->con);
    }

    //pendencias
    $sqlpendentes = "SELECT * FROM agenda WHERE confirmacao = 'pendente'";
    $resultpendente = mysqli_query($mysql->con, $sqlpendentes);

    if($resultpendente){
        $totalpendente = mysqli_num_rows($resultpendente);

        $pendenteuser = sprintf("%02d", $totalpendente);
        $pendente = $pendenteuser;
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($mysql->con);
    }

    //confirmados
    $sqlconfirmados = "SELECT * FROM agenda WHERE confirmacao = 'confirmado'";
    $resultconfirma= mysqli_query($mysql->con, $sqlconfirmados);

    if($resultconfirma){
        $totalconfirmados = mysqli_num_rows($resultconfirma);

        $confirmeuser = sprintf("%02d", $totalconfirmados);
        $confirmado = $confirmeuser;
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($mysql->con);
    }

?>-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleII.css"/>

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
            <li class="list">
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

    <div class="dashboard">
        <h2>Seja bem vindo!</h2>
        <p>Aqui você terá uma visão ampla do sistema, com o quadro geral</p>
        <div class="justify-content">
            <div>
                <div class="justify-content">
                    <div class="dashboard-content-inic">
                        <div class="justify-content">
                            <p>Usuarios cadastrados</p>
                            <i class="fa-solid fa-user"></i>
                        </div><br>
                        <h1><a href="adm_usuarios.php"><?php echo $pusuarios; ?></a></h1>
                    </div>
                    <div class="dashboard-content-inic">
                        <div class="justify-content">
                            <p>Agendamentos pendentes</p>
                            <i class="fa-solid fa-clock"></i>
                        </div><br>
                        <h1><a href="adm_pendencias.php"><?php echo $pendente; ?></a></h1>
                    </div>
                    <div class="dashboard-content-inic">
                        <div class="justify-content">
                            <p>Palestras confirmadas</p>
                            <i class="fa-solid fa-calendar-check"></i>
                        </div><br>
                        <h1><a href="adm_agenda.php"><?php echo $confirmado; ?></a></h1>
                    </div>
                </div>
                <div class="dashboard-content-fim">
                    <div class="justify-content">
                        <div>

                        </div>
                        <div>
                            <img src="image/img-dashboard.png" alt="dashboard" style="height:300px;width: 300px;">
                        </div>
                    </div>
                </div>
            </div>
            <div>
            <div class="dashboard-content-meio">
                <h2>Próximas apresentações</h2><br>
                <?php
                    while ($agenda = mysqli_fetch_assoc($resultconfirma)) {

                        $md = substr($agenda['dataselecionada'], 0, 5);

                        list($mes, $dia) = explode('/', $md);

                        $mes = sprintf('%02d', $mes);
                        $dia = sprintf('%02d', $dia);

                        $dataFormatada = $dia . '/' . $mes;
                ?>
                <div class="box-data" style="margin-bottom: 10px;">
                    <div class="justify-content">
                        <div style="width: 130px;">
                            <h1><?php echo $dataFormatada; ?></h1>
                        </div>
                        <div style="width: 100%;">
                            <p class="nomeevento"><?php echo $agenda['nomeevento']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

                <script>
                    const dashboardContentMeio = document.querySelector('.dashboard-content-meio');
                    const navigattion = document.querySelector('.navigattion');
                
                    navigattion.addEventListener('mouseenter', () => {
                        dashboardContentMeio.classList.add('expandido');
                    });
                
                    navigattion.addEventListener('mouseleave', () => {
                        dashboardContentMeio.classList.remove('expandido');
                    });
                </script>
            </div>
        </div>
    </div>
    
</body>
</html>