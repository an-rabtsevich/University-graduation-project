<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/PersonalFile.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/PersonalFile_full.docx';

$doc->setValue('inputSurname', $surname);
$doc->setValue('inputName', $firstName);
$doc->setValue('inputPatronymic', $patronymic);
$doc->setValue('inputSex', $sex);
$doc->setValue('inputYear', $birthYear);
$doc->setValue('inputMonth', $birthMonth);
$doc->setValue('inputDay', $birthDay);
$doc->setValue('inputPlaceOfBirth', $placeOfBirth);
$doc->setValue('inputNationality', $nationality);
$doc->setValue('inputEducation', $education);

$doc->setValue('inputEdName', $edName);
$doc->setValue('inputEducationStart', $educationStart);
$doc->setValue('inputEducationFinish', $educationFinish);
$doc->setValue('inputEducationFaculty', $educationFaculty);
$doc->setValue('inputEducationQualification', $educationQualification);
$doc->setValue('inputDiplom', $diplom);
$doc->setValue('inputNumOfDiplom', $numOfDiplom);

$doc->setValue('inputFamilyStatus', $familyStatus);
$doc->setValue('inputHusbandWife', $husbandWife);
$doc->setValue('inputChildren', $children);

$doc->setValue('inputPlaceOfLiving', $placeOfLiving);
$doc->setValue('inputPhone', $phone);
$doc->setValue('inputPassport', $passport);
$doc->setValue('inputNumOfPassport', $numOfPassport);
$doc->setValue('inputPlaceOfIssue', $placeOfIssue);
$doc->setValue('inputFirstDate', $firstDate);
$doc->setValue('inputPersonalNumber', $personalNumber);

$doc->setValue('inputDateOfEntry', $dateOfEntry);

$doc->saveAs($outputFile);

// $downloadFile = 'PersonalFile_full.docx';
// require 'saveFiles.php';
// saveFiles($outputFile, $downloadFile);
// unlink($outputFile);

?>