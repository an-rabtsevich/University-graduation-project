<?php

require 'connectDB.php';

// mysqli_query($connect, "DELETE FROM general_info WHERE `general_info`.`employee_id` = '$delId'");
mysqli_query($connect, "UPDATE `dismissed_info` SET `is_dismissed`='true' WHERE `e_id` = '$delId'");

?>