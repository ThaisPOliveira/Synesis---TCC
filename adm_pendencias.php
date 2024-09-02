<?php
    include('php/protect.php');
    include('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    if (!empty($_GET['search'])) {
        $data = $_GET['search'];

        $sql = "SELECT * FROM agenda WHERE confirmacao='pendente' AND (id_agenda LIKE '%$data%' OR nomeevento LIKE '%$data%') ORDER BY id_agenda DESC";
        $result = mysqli_query($mysql->con, $sql);

    } else {
        $sql = "SELECT * FROM agenda WHERE confirmacao='pendente'";
        $result = mysqli_query($mysql->con, $sql);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendencias</title>
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

    <div class="table-content">
        <h2>Pendências</h2>
        <p>confirme ou cancele os agendamentos pendentes dos usuários</p>

        <div class="box-search">
            <i class="search fa-solid fa-magnifying-glass"></i>
            <input type="search" name="searchpendencias" id="search" placeholder="Pesquisar...">
        </div>
        <script>
            var search = document.getElementById('search');
            search.addEventListener("keydown", function(event){
                if(event.key === "Enter"){
                    searchData();
                }
            });

            function searchData(){ 
                window.location = 'adm_pendencias.php?search=' + search.value;
            }
        </script>

        <table class="table-user">
            <tr class="top-table">
                <th>id</th>
                <th>Usuário</th>
                <th>Nome do evento</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Endereço</th>
                <th>Ponto de referência</th>
                <th>Telefone</th>
                <th>Descrição</th>
                <th>Aceitar</th>
                <th>Recusar</th>
            </tr>
            <?php
                while ($agenda = mysqli_fetch_assoc($result)) {
                    $sqlnome = "SELECT * FROM usuario WHERE id_usuario=" . $agenda['id_user'];
                    $resultnome = mysqli_query($mysql->con, $sqlnome);

                    if (!$resultnome) {
                        die('Erro na consulta SQL para obter o nome do usuário: ' . mysqli_error($mysql->con));
                    }

                    $user = mysqli_fetch_assoc($resultnome);

                    echo "<tr>";
                    echo "<td>" . $agenda['id_agenda'] . "</td>";
                    echo "<td>" . $user['nome'] . "</td>";
                    echo "<td>" . $agenda['nomeevento'] . "</td>";
                    echo "<td>" . $agenda['dataselecionada'] . "</td>";
                    echo "<td>" . $agenda['horario'] . "</td>";
                    echo "<td>" . $agenda['endereco'] . ", n°" . $agenda['numero'] . "</td>";
                    echo "<td>" . $agenda['referencia'] . "</td>";
                    echo "<td>" . $agenda['telefone'] . "</td>";
                    echo "<td>" . $agenda['descricao'] . "</td>";
                    echo "<td><b><a href='php/confirma_palestra.php?id=" . $agenda['id_agenda'] . "'><i class='fa-solid fa-check' style='color: green;'></a></i></b></td>";
                    echo "<td><b><a href='php/cancela_palestra.php?id=" .$agenda['id_agenda']. "'><i class='fa-solid fa-xmark' style='color: brown;'></a></i></b></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>

</body>
</html>