<?php

require 'config/connectDB.php';
require 'vendor/autoload.php';

$milInfo = mysqli_query($connect, "SELECT `general_info`.`personal_file_number`, `general_info`.`sex`, `general_info`.`surname`, `general_info`.`name`, `general_info`.`father_name`, `military_info`.`ticket`, `military_info`.`accounting_group`, `military_info`.`accounting_category`, `military_info`.`compound`, `military_info`.`military_rank`, `military_info`.`military_specialty`, `military_info`.`fitness_for_MS`, `military_info`.`name_of_MC` FROM `general_info` LEFT JOIN `military_info` ON `military_info`.`e_id` = `general_info`.`employee_id` LEFT JOIN `dismissed_info` ON `dismissed_info`.`e_id` = `general_info`.`employee_id` WHERE `military_info`.`ticket` != '' AND `dismissed_info`.`is_dismissed` = 'false'");

$milInfo = mysqli_fetch_all($milInfo);

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
              <a href="delete.php" class="nav-link text-dark">
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
              <a href="military.php" class="nav-link text-secondary">
                <img src="assets/img/soldier.png" alt="Hired" class="bi d-block mx-auto mb-1" width="25">
                Военнообязанные
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

    <div class="container py-3">
        <table class="table table-striped table-hover mt-3 mb-3">
            <thead>
                <tr class="table-primary">
                    <th>№ Личного дела</th>
                    <th>Пол</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Военный билет №</th>
                    <th>Группа учёта</th>
                    <th>Категория учёта</th>
                    <th>Состав</th>
                    <th>Воинское звание</th>
                    <th>№ ВУС</th>
                    <th>Годность к воинской службе</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($milInfo as $item) {
                    echo 
                    '
                    <tr>
                        <td>'.$item[0].'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                        <td>'.$item[5].'</td>
                        <td>'.$item[6].'</td>
                        <td>'.$item[7].'</td>
                        <td>'.$item[8].'</td>
                        <td>'.$item[9].'</td>
                        <td>'.$item[10].'</td>
                        <td>'.$item[11].'</td>
                    </tr>
                    ';
                }      
                ?>
            </tbody>
        </table>
    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/jquery-3.6.4.js"></script>
</body>
</html>