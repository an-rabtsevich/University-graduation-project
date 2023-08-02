<?php

require '../vendor/autoload.php';
require '../Library/NCLNameCaseRu.php';

$nc = new NCLNameCaseRu();

$numOfPersonalFile = $_POST['numOfPersonalFile'];

$surname = $_POST['inputSurname'];
$firstName = $_POST['inputName'];
$patronymic = $_POST['inputPatronymic'];
if ($_POST['inputSex'] == 1) {
    $sex = "Мужской";
}
else{
    $sex = "Женский";
}
$birthYear = $_POST['inputYear'];
$birthMonth = $_POST['inputMonth'];
$birthDay = $_POST['inputDay'];
$placeOfBirth = $_POST['inputPlaceOfBirth'];
$nationality = $_POST['inputNationality'];
$education = $_POST['inputEducation'];

$fullDateOfBirth = $birthDay . '.' . $birthMonth . '.' . $birthYear;

$edName = $_POST['inputEdName'];
$educationStart = $_POST['inputEducationStart'];
$educationFinish = $_POST['inputEducationFinish'];
$educationFaculty = $_POST['inputEducationFaculty'];
$educationSpeciality = $_POST['inputEducationSpeciality'];
$educationQualification = $_POST['inputEducationQualification'];
$diplom = $_POST['inputDiplom'];
$numOfDiplom = $_POST['inputNumOfDiplom'];
$dateOfDiplom = $_POST['inputDateOfDiplom'];

$familyStatus = $_POST['inputFamilyStatus'];
$husbandWife = $_POST['inputHusbandWife'];
$children = $_POST['inputChildren'];

$passport = $_POST['inputPassport'];
$numOfPassport = $_POST['inputNumOfPassport'];
$placeOfIssue = $_POST['inputPlaceOfIssue'];
$firstDate = $_POST['inputFirstDate'];
$finalDate = $_POST['inputFinalDate'];
$personalNumber = $_POST['inputPersonalNumber'];
$placeOfHome = $_POST['inputPlaceOfHome'];
$placeOfLiving = $_POST['inputPlaceOfLiving'];
$phone = $_POST['inputPhone'];

$numberOfMilitaryId = $_POST['inputNumberOfMilitaryId'];
$accountingGroup = $_POST['inputAccountingGroup'];
$accountingCategory = $_POST['inputAccountingCategory'];
$compound = $_POST['inputCompound'];
$militaryRank = $_POST['inputMilitaryRank'];
$numberOfMS = $_POST['inputNumberOfMS'];
$fitnessOfMS = $_POST['inputFitnessOfMS'];
$nameOfTheMC = $_POST['inputNameOfTheMC'];

$dateOfEntry = $_POST['inputDateOfEntry'];

$initials = mb_substr($firstName, 0, 1) . '.' . mb_substr($patronymic, 0, 1) . '.';

$numOfOrder = $_POST['numOfOrder'];
$jobPosition = $_POST['inputJobPosition'];
$jobDepartment = $_POST['inputJobDepartment'];
$jobStart = $_POST['inputJobStart'];
$jobDateOfJobApplication = $_POST['inputJobDateOfJobApplication'];

if ($_POST['inputJobContractOrAgreement'] == 1) {
    $jobContractOrAgreement = "контракт";
}
else{
    $jobContractOrAgreement = "договор";
}

$numOfJobContractOrAgreement = $_POST['inputNumOfJobContractOrAgreement'];
$probationaryPeriod = $_POST['inputProbationaryPeriod'];

switch ($_POST['inputContractPeriod']) {
    case 1:
        $contractPeriod = "1 год";
        break;

    case 2:
        $contractPeriod = "2 года";
        break;

    case 3:
        $contractPeriod = "3 года";
        break;

    case 4:
        $contractPeriod = "4 года";
        break;

    case 5:
        $contractPeriod = "5 лет";
        break;
}

$salaryFirstPart = $_POST['inputSalaryFirstPart'];
$salarySecondPart = $_POST['inputSalarySecondPart'];
$salaryFinalPart = $_POST['inputSalaryFinalPart'];
$hoursPerWeek = $_POST['inputHoursPerWeek'];
$daysPerWeek = $_POST['inputDaysPerWeek'];
$vacationPerYear = $_POST['inputVacationPerYear'];
$additionalVacationPerYear = $_POST['inputAdditionalVacationPerYear'];


require_once 'personalFile.php';
require_once 'titlePage.php';
require_once 'personalMilitaryCard.php';
require_once 'personalCard.php';
require_once 'controlCard.php';
require_once 'additionalPersonalCard.php';
require_once 'jobApplicationLetter.php';
require_once 'jobContract.php';

require_once '../config/insertIntoDB.php';

?> 