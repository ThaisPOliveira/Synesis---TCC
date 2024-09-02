<?php
    include('php/protect.php');
    include('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $nivelCondicao = "nivel='usuario' OR nivel='administrador'"; 

        $sql = "SELECT * FROM usuario WHERE ($nivelCondicao) AND (id_usuario LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%') ORDER BY id_usuario DESC";
        $result = mysqli_query($mysql->con, $sql);


    } else{
        $sql = "SELECT * FROM usuario WHERE nivel='usuario' or  nivel='administrador'";
        $result = mysqli_query($mysql->con, $sql);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
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
            <li class="list active">
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

    <div class="table-content">
        <div>
            <h1>Usuários</h1>
            <p>altere e exclua usuários cadastrados</p>

            <div class="box-search">
                <a href="adm_criar_usuario.php"><button class="add-user" style="cursor: pointer;"><i class="fa-solid fa-user-plus"></i></button></a>
                
                <i class="search fa-solid fa-magnifying-glass"></i>
                <input type="search" name="searchusuarios" id="search" placeholder="Pesquisar...">
            </div>

            <script>
                var search = document.getElementById('search');
                search.addEventListener("keydown", function(event){
                    if(event.key === "Enter"){
                        searchData();
                    }
                });

                function searchData(){ 
                    window.location = 'adm_usuarios.php?search=' + search.value;
                }
            </script>

            
            <table class="table-user">
                <tr class="top-table">
                    <th>Id</th>
                    <th>Nome Completo</th>
                    <th>Data de nascimento</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Nivel</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                <?php 
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user['id_usuario'] . "</td>";
                        echo "<td>" . $user['nome'] . "</td>";
                        echo "<td>" . $user['data'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td>" . str_repeat('•', strlen($user['senha'])) . "</td>";
                        echo "<td>" . $user['nivel'] . "</td>";
                        echo "<td style='width: 80px;'><a href='adm_edit_usuarios.php?id=$user[id_usuario]' style='color:#302aa5;'><b><i class='fa-solid fa-pen-to-square'></i></b></a></td>";
                        echo "<td style='width: 80px;'><a href='php/deleta_usuario.php?id=$user[id_usuario]' style='color:#a62727;'><b><i class='fa-solid fa-trash'></i></b></a></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>