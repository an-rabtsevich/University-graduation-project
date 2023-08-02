<?php

require 'config/connectDB.php';

// $info = mysqli_query($connect, "SELECT `employee_id`, `personal_file_number`, `surname`, `name`, `father_name` FROM `general_info`");
$info = mysqli_query($connect, "SELECT `general_info`.`employee_id`, `general_info`.`personal_file_number`, `general_info`.`surname`, `general_info`.`name`, `general_info`.`father_name` FROM `general_info` LEFT JOIN `dismissed_info` ON `dismissed_info`.`e_id` = `general_info`.`employee_id` WHERE `dismissed_info`.`is_dismissed` = 'false'");

$info = mysqli_fetch_all($info);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    
<header>
    <div class="px-3 py-2 text-white" style="background-color: #cfe2ff;">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="mainPage.html" class="nav-link text-dark my-2 my-lg-0 me-lg-auto">
            <img src="assets/img/home-page.png" alt="Hired" class="bi d-block mx-auto mb-1" width="25">
            Начало
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="recForm.html" class="nav-link text-dark">
                <img src="assets/img/hired.png" alt="Hired" class="bi d-block mx-auto mb-1" width="25">
                Приём
              </a>
            </li>
            <li>
              <a href="delete.php" class="nav-link text-secondary">
                <img src="assets/img/job.png" alt="Hired" class="bi d-block mx-auto mb-1" width="25">
                Увольнение
              </a>
            </li>
            <li>
              <a href="retirement.php" class="nav-link text-dark">
                <img src="assets/img/retirement.png" alt="Hired" class="bi d-block mx-auto mb-1" width="25">
                Пенсия
              </a>
            </li>
            <li>
              <a href="military.php" class="nav-link text-dark">
                <img src="assets/img/soldier.png" alt="Hired" class="bi d-block mx-auto mb-1" width="25">
                Военнообязанные
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

    <div class="container">

        <div class="row mt-3 mb-3">
            <div class="col-md-4">
                <input type="text" placeholder="Поиск" id="search" class="form-control d-inline" onkeyup="tableSearch()">
            </div>
        </div>

        <table class="table table-striped table-hover mt-3 mb-3" id="info-table">
            <thead>
                <tr class="table-primary">
                    <th>№ Личного дела</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="btn-del">
                <?php
            foreach ($info as $item) {
                echo 
                '
                <tr>
                    <td class="num">'.$item[1].'</td>
                    <td class="surname">'.$item[2].'</td>
                    <td>'.$item[3].'</td>
                    <td>'.$item[4].'</td>
                    <td><button type="button" data-delete="'.$item[0].'" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">&#9747;</button></td>
                </tr>
                ';
            }
            ?> 
            </tbody>
        </table>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заполните поля</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="dism/dismissalOrder.php">
                    <div class="modal-body">
                    <!-- d-none -->
                    <input type="text" class="del_id form-control d-none" id="delId" name="delId">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="numOfDismissalOrder" class="form-label">№ ПРИКАЗА</label>
                            <input type="text" class="form-control" id="numOfDismissalOrder" name="numOfDismissalOrder">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="inputReason" class="form-label">Основание:</label>
                            <select id="inputReason" class="form-select"  name="inputReason">
                                <option value="1" selected>Заявление</option>
                                <option value="2">Предложение об увольнении по соглашению сторон</option>
                                <option value="3">Соглашение о прекращении контракта</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-1">
                            <label for="inputReasonNum" class="form-label">№</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="inputReasonNum" name="inputReasonNum" disabled>
                        </div>
                        <div class="col-md-1">
                            <label for="inputReasonFrom" class="form-label">от</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="inputReasonFrom" name="inputReasonFrom">
                        </div>
                    </div>
                        
                    <p>Трудовой отпуск использован за период работы </p>
                    <div class="row mb-3">
                        <div class="col-md-1">
                            <label for="inputDismVacationFrom" class="form-label">с</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="inputDismVacationFrom" name="inputDismVacationFrom">
                        </div>
                        <div class="col-md-1">
                            <label for="inputDismVacationTo" class="form-label">по</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="inputDismVacationTo" name="inputDismVacationTo">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-12">
                            <label for="inputDateOfDism" class="form-label">Дата увольнения</label>
                            <input type="text" class="form-control" id="inputDateOfDism"  name="inputDateOfDism">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3 justify-content-end">
                        <div class="col-md-5">
                            <label for="inputDismDateOfEntry" class="form-label">Дата заполнения</label>
                            <input type="text" class="form-control" id="inputDismDateOfEntry"  name="inputDismDateOfEntry">
                        </div>
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Подтвердить</button>
                    </div>
                </form>
                </div>
            </div>
        </div>



    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/delete.js"></script>
    <script src="assets/js/jquery-3.6.4.js"></script>
</body>
</html>