<?php
    include ('php/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleII.css"/>
    <link rel="stylesheet" href="css/perfil.css">
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
            <li class="list active">
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

  <!-- Edição perfil -->
  <div class="container_perfil" style="margin-left:5%;width:90%;">
        <div class="card"> 
           <div class="info"> 
                <span style="font-weight: 600; font-size: 25px;">Meu Perfil</span> 
                <div>
                    <button id="editbutton">Editar</button> 
                </div>
            </div> 
            <form action="php/atualizar_perfil.php" method="POST">
                <div class="forms"> 
                    <div class="inputs"> 
                        <span><b>Nome Completo</b></span> 
                        <input name="nomee" type="text" readonly value="<?php echo $_SESSION['nome']; ?>"> 
                    </div> 
                    <div class="inputs"> 
                        <span><b>Data de Nascimento</b></span>
                        <input name="dataa" type="int" readonly maxlength="10" value="<?php echo $_SESSION['data']; ?>">
                    </div>
                    <div class="inputs"> 
                        <span><b>Email</b></span> 
                        <input name="emaill" type="text" readonly value="<?php echo $_SESSION['email']; ?>"> 
                    </div> 
                    <div class="inputs"> 
                        <span><b>Senha</b></span>
                        <input name="senhaa" type="password" readonly value="<?php echo $_SESSION['senha']; ?>">
                    </div>
                    <br>
                    <button id="savebutton" class="salvarconta" style="display:none;font-size: 1rem;padding: 3px;height:30px;width:150px;border:none;color: var(--color-1);border-radius:4px;background-color:  var(--color-4);cursor:pointer;border-radius: 50px;">Salvar</button>
                </div> 
            </form>
            <button id="deletebutton" class="excluirconta">Excluir conta</button>
            <script>

                var deletbutton = document.getElementById('deletebutton');
                deletbutton.addEventListener('click', function(){
                let confirmacao = confirm("Tem certeza que deseja excluir sua conta?")

                if(confirmacao){
                    window.location.href='php/deleta.php';
                    } 
                });
            </script>
        </div>
    </div>   
   
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.querySelector('input[name="dataa"]');

            dateInput.addEventListener('input', function(event) {

                let inputValue = event.target.value;
                inputValue = inputValue.replace(/\D/g, '');

                if (inputValue.length >= 4) {
                    inputValue = inputValue.substring(0, 2) + '/' + inputValue.substring(2, 4) + (inputValue.length > 4 ? '/' + inputValue.substring(4, 8) : '');
                }
                event.target.value = inputValue;
            });
        });

        var editbutton = document.getElementById('editbutton');
        var savebutton = document.getElementById('savebutton');
        var deletebutton = document.getElementById('deletebutton');
        var inputs = document.querySelectorAll('input[type="text"], input[type="password"], input[type="int"]');

        editbutton.addEventListener('click', function() {
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].toggleAttribute('readonly');
            }

            if (editbutton.innerHTML == "Editar") {
                editbutton.innerHTML = "Voltar";
                savebutton.style.display = 'inline';
                deletebutton.style.display = 'none'; 
            } else {
                editbutton.innerHTML = "Editar";
                savebutton.style.display = 'none'; 
                deletebutton.style.display = 'inline';
            }
        });
   </script>

</body>
</html>