<?php
    include('conexao/conexao.php');
    include ('php/protect.php');
    
    $mysql = new BancodeDados();
    $mysql->conecta();

    $sql = "SELECT * FROM agenda WHERE id_user = " . $_SESSION['id'];
    $result = mysqli_query($mysql->con, $sql);

    $psql = "SELECT * FROM agenda WHERE id_user = " . $_SESSION['id']." AND finalizado = 'nao'" ;
    $presult = mysqli_query($mysql->con, $psql);
 
    $palestra_agendada = mysqli_num_rows($result) > 0;

    $limite = 3;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleII.css"/>
    <link rel="stylesheet" href="css/agendamento.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <div class="navigattion">
        <ul>
            <li>
                <a href="user_inicio.php">
                    <span class="icon"><img src="image/logo.png"></span>
                    <span class="title"><b>Cultura da Paz</b></span>

                </a>
            </li>
            <li class="list">
                <a href="user_perfil.php">
                    <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                    <span class="title"> Perfil </span>
                </a>
            </li>
            <li class="list active">
                <a href="user_agenda.php">
                    <span class="icon"><ion-icon name="calendar-clear-outline"></ion-icon> </span>
                    <span class="title"> Agendamento </span>
                </a>
            </li>
            <li class="list">
                <a href="user_histórico.php">
                    <span class="icon"> <ion-icon name="file-tray-stacked-outline"></ion-icon> </span>
                    <span class="title"> Historico </span>
                </a>
            </li>
            <li class="list">
                <a href="user_ajuda.php">
                    <span class="icon"> <ion-icon name="construct-outline"></ion-icon> </span>
                    <span class="title"> Ajuda </span>
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

    <div class="content-agenda">
        <div class="content-agendamento">
            <h1>Agendamento</h1><br>
            <p>Marque e consulte suas palestras!</p>

            <div class="con-agenda">
                <a href="user_agendamento.php">
                    <button class="novaagenda"><h1 class="icone-agenda"><i class="fa-regular fa-calendar-plus"></i></h1><p>Novo agendamento</p></button>
                </a>
                <?php if ($palestra_agendada) { ?>
                    <?php
                        while ($agenda = mysqli_fetch_assoc($result)) {
                            
                            $nomeEvento = $agenda['nomeevento'];
                            $dataSelecionada = $agenda['dataselecionada'];
                            $horario = $agenda['horario'];
                            $endereco = $agenda['endereco'];
                            $numero = $agenda['numero'];
                            $descricao = $agenda['descricao'];      
                            $confirmacao = $agenda['confirmacao'];
                            $finalizado = $agenda['finalizado'];

                            if($confirmacao == "pendente"){
                                $cor = "orange";
                            } else if($confirmacao == "confirmado"){
                                $cor = "green";
                            } else {
                                $cor = "red";
                            }

                            if($finalizado == "nao"){
                    ?>
                    <div class="agenda">
                        <div class="info-agenda">
                            <div class="justify-content">
                                <p class="info"><b><?php echo $nomeEvento; ?></b></p> 
                                <div class="circle" style="background-color: <?php echo $cor; ?>; cursor: pointer;">
                                    <div class="tooltip">Status: <?php echo $confirmacao; ?></div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const circles = document.querySelectorAll('.circle');

                                            circles.forEach((circle) => {
                                                const tooltip = circle.querySelector('.tooltip');

                                                circle.addEventListener('mouseover', function () {
                                                    tooltip.style.visibility = 'visible';
                                                    tooltip.style.opacity = '1';
                                                });

                                                circle.addEventListener('mouseout', function () {
                                                    tooltip.style.visibility = 'hidden';
                                                    tooltip.style.opacity = '0';
                                                });
                                            });
                                        });
                                    </script>
                                </div>

                            </div><br>
                            <p class="info"><b>Data</b> <?php echo $dataSelecionada; ?></p>
                            <p class="info"><b>Horário</b> <?php echo $horario; ?></p>
                            <p class="info"><b>Local</b> <?php echo $endereco . ', ' . $numero; ?></p>
                            <p class="descricao"><b>Descrição</b> <?php echo $descricao; ?></p><br>
                            <?php echo "<a href='user_agenda_info.php?id=$agenda[id_agenda]' class='action_btn_vjm'>Veja mais</a>";?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                <?php } ?>
        </div>

        <i onclick="abrirModal()" class="fa-regular fa-circle-question" id="info-circle"></i>

        <div class="janela-modal" id="janela-modal">
            <div class="modal">
                <button class="fechar" id="fechar"><i class="fa-solid fa-xmark"></i></button>
                <h1>Sistema de confirmação</h1><br>
                <img class="img-modal" src="image/img-info-confirmação.png" alt="sistema de confirmação">
                <p>Nosso sistema de confirmação das palestras consiste na identificação visual ao lado do nome da palestra, sendo a cor <b style="color: green;">VERDE</b> a confirmação da palestra, <b style="color: orange;">AMARELO</b> a pendência da confirmação e o <b style="color: red;">VERMELHO</b> caso seja cancelada por alguma falta de informações ou ação suspeita. Também é possível ver o status da palestra ao entrar no detalhamento da tal.</p>
            </div>
        </div>

        <script>
            function abrirModal() {
                const modal = document.getElementById('janela-modal')
                modal.classList.add('abrir')

                modal.addEventListener('click', (e) => {
                    if (e.target.id == 'fechar' || e.target.id == 'janela-modal') {
                        modal.classList.remove('abrir')
                    }
                });
            }

            <?php if (mysqli_num_rows($result) === 1): ?>
                abrirModal();
            <?php endif; ?>
        </script>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const novaAgendaBtn = document.querySelector('.novaagenda');

            novaAgendaBtn.addEventListener('click', function (event) {

                if (<?php echo mysqli_num_rows($presult); ?> >= <?php echo $limite; ?>) {
                    event.preventDefault(); 
                    alert('Você atingiu o limite de palestras agendadas. Não é possível agendar mais palestras.');
                }
            });
        });
    </script>
</body>
</html>