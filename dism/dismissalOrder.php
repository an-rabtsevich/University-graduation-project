<?php

require '../vendor/autoload.php';
require '../config/connectDB.php';
require '../Library/NCLNameCaseRu.php';

$nc = new NCLNameCaseRu();

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/dismissal/DismissalOrder.docx');

$outputFile = '../docTemplates/dismissal/dismissal_full/DismissalOrder_full.docx';


$delId = $_POST['delId'];

//$personalInfo = mysqli_query($connect, "SELECT `general_info`.`employee_id`, `general_info`.`sex`, `general_info`.`surname`, `general_info`.`name`, `general_info`.`father_name`, `recruitment_info`.`position`, `recruitment_info`.`department` FROM `general_info` LEFT JOIN `recruitment_info` ON `recruitment_info`.`e_id` = `general_info`.`employee_id` WHERE `general_info`.`employee_id` = '24'");
$personalInfo = mysqli_query($connect, "SELECT `general_info`.`employee_id`, `general_info`.`sex`, `general_info`.`surname`, `general_info`.`name`, `general_info`.`father_name`, `recruitment_info`.`position` FROM `general_info` LEFT JOIN `recruitment_info` ON `recruitment_info`.`e_id` = `general_info`.`employee_id` WHERE `general_info`.`employee_id` = '$delId'");

$personalInfo = mysqli_fetch_all($personalInfo);

$dismSex = $personalInfo[0][1];
$dismSurname = $personalInfo[0][2];
$dismName = $personalInfo[0][3];
$dismPatronymic = $personalInfo[0][4];
$dismPosition = $personalInfo[0][5];
//$dismDepartment = $personalInfo[0][6];

if ($dismSex === "Мужской") {
    $dismFullNameV = $nc->qFullName($dismSurname, $dismName, $dismPatronymic, NCL::$MAN, NCL::$VINITELN);
    $dismSurnameR = $nc->qSecondName($dismSurname, NCL::$MAN, NCL::$RODITLN);
}
else{
    $dismFullNameV = $nc->qFullName($dismSurname, $dismName, $dismPatronymic, NCL::$WOMAN, NCL::$VINITELN);
    $dismSurnameR = $nc->qSecondName($dismSurname, NCL::$WOMAN, NCL::$RODITLN);
}

$dismInitials = mb_substr($dismName, 0, 1) . '.' . mb_substr($dismPatronymic, 0, 1) . '.';

$dismPositionR = $nc->qFirstName($dismPosition, NCL::$MAN, NCL::$RODITLN);
//$dismDepartmentR = $nc->qFirstName($dismDepartment, NCL::$MAN, NCL::$RODITLN);


$numOfDismissalOrder = $_POST['numOfDismissalOrder'];

$reasonNum = $_POST['inputReasonNum'];
$reasonFrom = $_POST['inputReasonFrom'];

switch ($_POST['inputReason']) {
    case 1:
        $reason = "Заявление" . " " . $dismSurnameR . " " . $dismInitials;
        break;

    case 2:
        $reason = "Предложение об увольнении по соглашению сторон №" . $reasonNum;
        break;

    case 3:
        $reason = "Соглашение о прекращении контракта №" . $reasonNum;
        break;
}

$dismVacationFrom = $_POST['inputDismVacationFrom'];
$dismVacationTo = $_POST['inputDismVacationTo'];
$dateOfDism = $_POST['inputDateOfDism'];
$dismDateOfEntry = $_POST['inputDismDateOfEntry'];

$doc->setValue('numOfDismissalOrder', $numOfDismissalOrder);
$doc->setValue('inputReason', $reason);
$doc->setValue('inputReasonFrom', $reasonFrom);
$doc->setValue('inputDismVacationFrom', $dismVacationFrom);
$doc->setValue('inputDismVacationTo', $dismVacationTo);
$doc->setValue('inputDateOfDism', $dateOfDism);
$doc->setValue('inputDismDateOfEntry', $dismDateOfEntry);

$doc->setValue('dismFullNameV', $dismFullNameV);
$doc->setValue('dismSurname', $dismSurname);
$doc->setValue('dismInitials', $dismInitials);
$doc->setValue('dismPositionR', $dismPositionR);
//$doc->setValue('dismDepartmentR', $dismDepartmentR);

$doc->saveAs($outputFile);

require_once '../config/deleteFromDB.php';

?>