<?php
    include('php/protect.php');
    include('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    $sql = "SELECT * FROM agenda WHERE confirmacao = 'confirmado' AND finalizado='nao'";
    $result= mysqli_query($mysql->con, $sql);
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
    <link rel="stylesheet" href="css/agendamento.css">


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
            <li class="list active">
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

    <div class="content-agenda">   
        <div class="content-agendamento">
            <div>
                <div class="justify-content">
                    <div>
                        <div class="calendar">
                            <div class="header">
                            <div class="month">July 2021</div>
                            <div class="btns">
                                <!-- hoje -->
                                <div class="btn today">
                                <i class="fas fa-calendar-day"></i>
                                </div>
                                <!-- mês anterior -->
                                <div class="btn prev">
                                <i class="fas fa-chevron-left"></i>
                                </div>
                                <!-- proximo mês -->
                                <div class="btn next">
                                <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                            </div>
                            <div class="weekdays">
                            <div class="day">Dom</div>
                            <div class="day">Seg</div>
                            <div class="day">Ter</div>
                            <div class="day">Qua</div>
                            <div class="day">Qui</div>
                            <div class="day">Sex</div>
                            <div class="day">Sáb</div>
                            </div>
                            <div class="days"> </div>
                        </div>

                    </div>
                    <div>
                        <div class="box-dias-agend">
                            <h1>Palestras agendadas</h1><br>
                            <?php
                                mysqli_data_seek($result, 0); 
                                while ($agenda = mysqli_fetch_assoc($result)) {
                                    
                                    $pdata = $agenda['dataselecionada'];
                                    $pnomeevento = $agenda['nomeevento'];
                                    echo "<div class='box-dias'>";
                                    echo "<p>$pdata</p>";
                                    echo "<a href='adm_agenda_info.php?id=$agenda[id_agenda]'><h2>$pnomeevento</h2></a>";
                                    echo "</div>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const daysContainer = document.querySelector(".days");
            const nextBtn = document.querySelector(".next");
            const prevBtn = document.querySelector(".prev");
            const todayBtn = document.querySelector(".today");
            const month = document.querySelector(".month");
        
            const months = [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro",
            ];
        
            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();
        
            const renderCalendar = () => {
                const date = new Date(currentYear, currentMonth, 1);
                date.setDate(1);
        
                const firstDayIndex = date.getDay();
                const lastDay = new Date(currentYear, currentMonth + 1, 0);
                const lastDayDate = lastDay.getDate();
                const nextDays = 7 - ((firstDayIndex + lastDayDate) % 7);
        
                month.innerHTML = `${months[currentMonth]} ${currentYear}`;
        
                let days = "";
        
                for (let i = firstDayIndex - 1; i >= 0; i--) {
                    const prevLastDay = new Date(currentYear, currentMonth, 0);
                    const prevLastDayDate = prevLastDay.getDate();
                    days += `<div class="day prev">${prevLastDayDate - i}</div>`;
                }
        
                for (let j = 1; j <= lastDayDate; j++) {
                    let dayClass = "day";
                    const currentDate = new Date();
        
                    if (
                        j === currentDate.getDate() &&
                        currentMonth === currentDate.getMonth() &&
                        currentYear === currentDate.getFullYear()
                    ) {
                        dayClass += " today";
                    }
        
                    days += `<div class="${dayClass}">${j}</div>`;
                }
        
                for (let k = 1; k <= nextDays; k++) {
                    days += `<div class="day next">${k}</div>`;
                }
        
                daysContainer.innerHTML = days;
                hideTodayBtn();
            };
        
            function hideTodayBtn() {
                if (
                    currentMonth === new Date().getMonth() &&
                    currentYear === new Date().getFullYear()
                ) {
                    todayBtn.style.display = "none";
                } else {
                    todayBtn.style.display = "flex";
                }
            }
        
            nextBtn.addEventListener("click", () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                renderCalendar();
            });
        
            prevBtn.addEventListener("click", () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                renderCalendar();
            });
        
            todayBtn.addEventListener("click", () => {
                currentMonth = new Date().getMonth();
                currentYear = new Date().getFullYear();
                renderCalendar();
            });
        
            renderCalendar();
        </script>
    </div>

</body>
</html>
