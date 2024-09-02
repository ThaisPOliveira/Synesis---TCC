<?php
    include ('php/protect.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda</title>
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
            <li class="list active">
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
    
        <div style="display: block;position:relative;margin-left: 5%;transform: translateY(-50%);width:80%;"><br> <br> 
            <h1>AJUDA </h1><br>
            <details class="detailAjuda">
                <summary>Qual é o foco das palestras?</summary> 
                <P><br>As palestras sobre bullying geralmente têm o objetivo de aumentar a conscientização sobre o problema e fornecer informações, estratégias e recursos para lidar com o bullying
                O foco específico das palestras sobre bullying pode variar dependendo do público-alvo e do contexto, como palestras para alunos, pais, professores ou profissionais de recursos humanos em empresas. 
                O objetivo principal é sempre fornecer informações e estratégias para prevenir, identificar e lidar com o bullying de maneira eficaz.
                </P>
            </details>
            <br> 
            
            <details class="detailAjuda">
                <summary>  Posso cancelar uma palestra já agendada? </summary> 
                <P><br>É perfeitamente possível cancelar uma palestra, desde que haja motivos pertinentes e justificáveis para tal decisão.
                Portanto, cancelar uma palestra é uma decisão que deve ser tomada com responsabilidade e consideração pelos impactos envolvidos. 
                Quando motivos pertinentes e justificáveis estão presentes, o cancelamento pode ser a opção mais sensata para garantir a segurança, a qualidade e a integridade do evento.
                </P>
            </details>
            <br> 
            
            <details class="detailAjuda">
                <summary> Tive problema com o pagamento, o que eu faço? </summary> 
                <P><br>Entre em contato pelo Whatsapp ou pelo Email e converse conosco.  Resolveremos o seu problema, com outra maneira de pagamento ou o seu dinheiro será extornado.</P>
            </details>
            <br> 
            
            <details class="detailAjuda">
                <summary> Tive problema com a palestra, o que eu faço?? </summary> 
                <P><br> Mande um email detalhando o ocorrido e iremos resolver da melhor maneira possivel. </P>
            </details>
            <br> 
        
        </div>

        <script>
            const summaries = document.querySelectorAll('summary');
            summaries.forEach((summary) => {
            summary.addEventListener('click', closeOpenedDetails);
            });
            
            function closeOpenedDetails() {
                summaries.forEach((summary) => {
                    let detail = summary.parentNode;

                    if (detail != this.parentNode) {
                        detail.removeAttribute('open');
                    }
                });
            }
        </script>


</body>
</html>