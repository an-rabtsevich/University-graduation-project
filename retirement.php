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
                  <a href="retirement.php" class="nav-link text-secondary">
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


    <div class="container py-3">

        <form action="retirement.php" method="post">
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="inputRetFrom" class="form-label">с</label>
                  <input type="date" class="form-control" id="inputRetFrom"  name="inputRetFrom">
                </div>
                <div class="col-md-2">
                    <label for="inputRetTo" class="form-label">по</label>
                  <input type="date" class="form-control" id="inputRetTo"  name="inputRetTo">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </form>

        <?php

        require 'config/connectDB.php';
        require 'vendor/autoload.php';

        $retInfo = mysqli_query($connect, "SELECT `general_info`.`employee_id`, `general_info`.`personal_file_number`, `general_info`.`sex`, `general_info`.`surname`, `general_info`.`name`, `general_info`.`father_name`, `general_info`.`date_of_birth` FROM `general_info` LEFT JOIN `dismissed_info` ON `dismissed_info`.`e_id` = `general_info`.`employee_id` WHERE `dismissed_info`.`is_dismissed` = 'false'");

        $retInfo = mysqli_fetch_all($retInfo);

        $retArray = array();

        $retFrom = $_POST['inputRetFrom'];
        $retTo = $_POST['inputRetTo'];

        $retFromMan = strtotime(date_format(date_modify(date_create($retFrom), '-63 year'), 'd.m.Y'));
        $retToMan = strtotime(date_format(date_modify(date_create($retTo), '-63 year'), 'd.m.Y'));

        $retFromWoman = strtotime(date_format(date_modify(date_create($retFrom), '-58 year'), 'd.m.Y'));
        $retToWoman = strtotime(date_format(date_modify(date_create($retTo), '-58 year'), 'd.m.Y'));

        foreach ($retInfo as $value) {
            $retDate = $value[6];
            $retDate = strtotime($retDate);

            if ($value[2] === "Мужской") {
                if (($retDate >= $retFromMan) && ($retDate <= $retToMan)) {
                    $retArray[] = $value;
                }
            }
            else{
                if (($retDate >= $retFromWoman) && ($retDate <= $retToWoman)) {
                    $retArray[] = $value;
                }
            }
        }

        echo 
        '
        <table class="table table-striped table-hover mt-3 mb-3" id="info-table">
                <thead>
                    <tr class="table-primary">
                        <th>№ Личного дела</th>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Дата рождения</th>
                    </tr>
                </thead>
                <tbody class="btn-del">
        ';

                    foreach ($retArray as $item) {
                        echo 
                        '
                        <tr>
                            <td>'.$item[1].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td>'.$item[6].'</td>
                        </tr>
                        ';
                    }
                    
            echo 
            '
                </tbody>
            </table>
            ';
        ?>

    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/jquery-3.6.4.js"></script>
</body>
</html>