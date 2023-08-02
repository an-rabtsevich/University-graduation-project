<?php

$connect = mysqli_connect('localhost', 'root', '', 'Employees_Info');
if (!$connect) {
    die('Ошибка подключения к БД');
}

?>