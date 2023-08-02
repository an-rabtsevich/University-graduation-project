<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/JobContract.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/JobContract_full.docx';

$doc->setValue('inputSurname', $surname);
$doc->setValue('inputName', $firstName);
$doc->setValue('inputPatronymic', $patronymic);

$doc->setValue('inputPassport', $passport);
$doc->setValue('inputNumOfPassport', $numOfPassport);
$doc->setValue('inputPlaceOfIssue', $placeOfIssue);
$doc->setValue('inputFirstDate', $firstDate);
$doc->setValue('inputPlaceOfHome', $placeOfHome);

$doc->setValue('inputDateOfEntry', $dateOfEntry);

$doc->setValue('initials', $initials);

$doc->setValue('numOfOrder', $numOfOrder);

$jobPositionR = $nc->qFirstName($jobPosition, NCL::$MAN, NCL::$RODITLN);
$doc->setValue('inputJobPosition', $jobPositionR);

$doc->setValue('inputJobDepartment', $jobDepartment);
$doc->setValue('inputJobStart', $jobStart);
$doc->setValue('inputProbationaryPeriod', $probationaryPeriod);
$doc->setValue('inputContractPeriod', $contractPeriod);
$doc->setValue('inputSalaryFirstPart', $salaryFirstPart);
$doc->setValue('inputSalarySecondPart', $salarySecondPart);
$doc->setValue('inputSalaryFinalPart', $salaryFinalPart);
$doc->setValue('inputHoursPerWeek', $hoursPerWeek);
$doc->setValue('inputDaysPerWeek', $daysPerWeek);

if (substr($vacationPerYear, -1) == 1 ) {
    if ($vacationPerYear == 11) {
        $vacationDays = "дней";
        $addVacationDaysEnding = "ых";
    }
    else{
        $vacationDays = "день";
        $vacationDaysEnding = "ый";
    }
}
else if(substr($vacationPerYear, -1) >= 2 &&  substr($vacationPerYear, -1) <= 4){
    if ($vacationPerYear >= 12 && $vacationPerYear <= 14) {
        $vacationDays = "дней";
        $vacationDaysEnding = "ых";
    }
    else{
        $vacationDays = "дня";
        $vacationDaysEnding = "ых";
    }
}
else{
    $vacationDays = "дней";
    $vacationDaysEnding = "ых";
}

if (substr($additionalVacationPerYear, -1) == 1 ) {
    if ($additionalVacationPerYear == 11) {
        $addVacationDays = "дней";
        $addVacationDaysEnding = "ых";
    }
    else{
        $addVacationDays = "день";
        $addVacationDaysEnding = "ый";
    }
}
else if(substr($additionalVacationPerYear, -1) >= 2 &&  substr($additionalVacationPerYear, -1) <= 4){
    if ($additionalVacationPerYear >= 12 && $additionalVacationPerYear <= 14) {
        $addVacationDays = "дней";
        $addVacationDaysEnding = "ых";
    }
    else{
        $addVacationDays = "дня";
        $addVacationDaysEnding = "ых";
    }
}
else{
    $addVacationDays = "дней";
    $addVacationDaysEnding = "ых";
}

$doc->setValue('inputVacationPerYear', $vacationPerYear);
$doc->setValue('inputAdditionalVacationPerYear', $additionalVacationPerYear);

$doc->setValue('vacationDaysEnding', $vacationDaysEnding);
$doc->setValue('vacationDays', $vacationDays);
$doc->setValue('addVacationDaysEnding', $addVacationDaysEnding);
$doc->setValue('addVacationDays', $addVacationDays);

switch ($contractPeriod) {
    case "1 год":
        $jobFinish = date_format(date_modify(date_create($jobStart), '-1 day +1 year'), 'd.m.Y');
        break;

    case "2 года":
        $jobFinish = date_format(date_modify(date_create($jobStart), '-1 day +2 year'), 'd.m.Y');
        break;

    case "3 года":
        $jobFinish = date_format(date_modify(date_create($jobStart), '-1 day +3 year'), 'd.m.Y');
        break;

    case "4 года":
        $jobFinish = date_format(date_modify(date_create($jobStart), '-1 day +4 year'), 'd.m.Y');
        break;

    case "5 лет":
        $jobFinish = date_format(date_modify(date_create($jobStart), '-1 day +5 year'), 'd.m.Y');
        break;
}

$doc->setValue('jobFinish', $jobFinish);

$doc->saveAs($outputFile);

?>