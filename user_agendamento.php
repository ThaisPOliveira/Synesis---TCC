<?php
    include ('php/protect.php');
    include ('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    $plimite = 3;

    $sql = "SELECT * FROM agenda WHERE id_user = " . $_SESSION['id'];
    $result = mysqli_query($mysql->con, $sql);

    $psql = "SELECT * FROM agenda WHERE id_user = " . $_SESSION['id']." AND finalizado = 'nao'" ;
    $presult = mysqli_query($mysql->con, $psql);

    if (mysqli_num_rows($presult) >= $plimite) {
        echo "<script>alert('Você atingiu o limite de palestras agendadas. Não é possível agendar mais palestras.');window.location.href='javascript:history.back()';</script>";
    } else {
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
                    <div class="info-escolhedia">
                        <div class="cbc-info">
                            <p>Informe os dados</p>
                        </div>
                        <div>
                            <form action="php/agendamento.php" method="post">
                                <div class="form-agenda">
                                    <h3 class="selected-day">Selecione uma data</h3><br>
                                    <div class="form-agenda-info" style="display: none;">

                                        <input type="hidden" name="dataselecionada" id="dataSelecionada" value="">

                                        <div class="justify-content">
                                            <div style="width: 100%;">
                                                <label>Nome do evento</label>
                                                <input type="text" name="nomeevento" class="form-agenda-input" required><br>
                                            </div>
                                            <div style="margin-left: 20px; width: 150px;">
                                                <label>Horário</label>
                                                <select name="horario" class="form-agenda-input" required>
                                                    <option value="select"></option>
                                                    <option value="09:00">09h00</option>
                                                    <option value="09:30">09h30</option>
                                                    <option value="10:00">10h00</option>
                                                    <option value="10:30">10h30</option>
                                                    <option value="11:00">11h00</option>
                                                    <option value="11:30">11h30</option>
                                                    <option value="12:00">12h00</option>
                                                    <option value="12:30">12h30</option>
                                                    <option value="13:00">13h00</option>
                                                    <option value="13:30">13h30</option>
                                                    <option value="14:00">14h00</option>
                                                    <option value="14:30">14h30</option>
                                                    <option value="15:00">15h00</option>
                                                    <option value="15:30">15h30</option>
                                                    <option value="16:00">16h00</option>
                                                    <option value="16:30">16h30</option>
                                                    <option value="17:00">17h00</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="justify-content">
                                           <div style="width: 100%;">
                                                <label>Endereço</label>
                                                <input type="text" name="endereco" class="form-agenda-input" required>
                                           </div>
                                            <div style="margin-left: 20px; width: 150px;">
                                                <label>Número</label>
                                                <input type="int" name="numero" class="form-agenda-input" required>
                                            </div>
                                        </div>

                                        <label>Ponto de referência</label>
                                        <input type="text" name="referencia" class="form-agenda-input"><br>

                                        <label>Telefone</label>
                                        <input type="int" maxlength="13" name="telefone" class="form-agenda-input" required><br>

                                        <script>
                                            function formatarTelefone(input) {
                                                
                                                let phoneNumber = input.value.replace(/\D/g, '');
                                                if (phoneNumber.length > 2) {
                                                    phoneNumber = `(${phoneNumber.substring(0, 2)})${phoneNumber.substring(2)}`;
                                                }
                                                input.value = phoneNumber;
                                            }
                                            document.querySelector('input[name="telefone"]').addEventListener('input', function () {
                                                formatarTelefone(this);
                                            });
                                        </script>

                                        <span>é necessário um número cadastrado no Whatsapp, pois entre um a três dias uteis, entraremos em contato</span><br><br>
                                        
                                        <label>Descriçao</label>
                                        <textarea name="descricao" class="form-agenda-input"></textarea><br><br>

                                        <input type="submit" value="Agendar palestra" class="form-input-submit" >

                                    </div>
                                </div>
                            </form>
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
        let selectedDayElement = null;

        const renderCalendar = () => {
            const date = new Date(currentYear, currentMonth, 1);
            date.setDate(1);

            const firstDay = new Date(currentYear, currentMonth, 1);
            const lastDay = new Date(currentYear, currentMonth + 1, 0);
            const lastDayIndex = lastDay.getDay();
            const lastDayDate = lastDay.getDate();
            const prevLastDay = new Date(currentYear, currentMonth, 0);
            const prevLastDayDate = prevLastDay.getDate();
            const nextDays = 7 - lastDayIndex - 1;

            month.innerHTML = `${months[currentMonth]} ${currentYear}`;

            let days = "";

            for (let x = firstDay.getDay(); x > 0; x--) {
                days += `<div class="day prev">${prevLastDayDate - x + 1}</div>`;
            }

            for (let i = 1; i <= lastDayDate; i++) {
                let dayClass = "day";
                const currentDate = new Date();

                if (
                    (currentYear === currentDate.getFullYear() && currentMonth === currentDate.getMonth() && i < currentDate.getDate()) ||
                    (currentYear === currentDate.getFullYear() && currentMonth < currentDate.getMonth()) ||
                    (currentYear < currentDate.getFullYear())
                ) {
                    dayClass += " past-day";
                    days += `<div class="${dayClass}" style="background-color: #dfdfdf;">${i}</div>`;
                } else if (i === currentDate.getDate() && currentMonth === currentDate.getMonth() && currentYear === currentDate.getFullYear()) {
                    dayClass += " today";
                    days += `<div class="${dayClass}">${i}</div>`;
                } else {
                    days += `<div class="${dayClass}" onclick="selectDay(this)">${i}</div>`;
                }
            }

            for (let j = 1; j <= nextDays; j++) {
                days += `<div class="day next">${j}</div>`;
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

        function selectDay(dayElement) {
            const selectedDay = dayElement.textContent;
            const selectedMonth = months[currentMonth];
            const selectedYear = currentYear;
            const selectedDate = `${selectedDay} de ${selectedMonth} de ${selectedYear}`;

            document.querySelector('.selected-day').textContent = `Data selecionada: ${selectedDate}`;

            const formattedDate = `${selectedDay}/${currentMonth + 1}/${currentYear}`;
            document.querySelector('#dataSelecionada').value = formattedDate;

            if (selectedDayElement) {
                selectedDayElement.style.backgroundColor = ''; // Remove o fundo do dia anterior
            }

            dayElement.style.backgroundColor = '#BBD7EC';
            selectedDayElement = dayElement;

            document.querySelector('.form-agenda-info').style.display = 'block';
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
<?php
}

?>