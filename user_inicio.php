<?php
    include ('php/protect.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleII.css"/>
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />

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
            <li class="list">
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

    <div style='margin-left:5%;width:90%;' class="justify-content">
        <div  class="user-frase-bv"> 
            <h2> Seja bem vindo, <?php echo $_SESSION['nome'];?>!</h2><br>
            <p>Nesta parte, você poderá editar os dados do seu perfil, conversar com nossos palestrantes e agendar sua desejada palestra!</p>
        </div>
        <div>
            <img src="image/img-user1.png" class="user-img">
        </div>
    </div>
</body>
</html>
