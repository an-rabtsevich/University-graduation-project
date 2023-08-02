<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/PersonalCard.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/PersonalCard_full.docx';

$doc->setValue('numOfPersonalFile', $numOfPersonalFile);

$doc->setValue('inputSurname', $surname);
$doc->setValue('inputName', $firstName);
$doc->setValue('inputPatronymic', $patronymic);
$doc->setValue('inputSex', $sex);
$doc->setValue('inputYear', $birthYear);
$doc->setValue('inputMonth', $birthMonth);
$doc->setValue('inputDay', $birthDay);
$doc->setValue('inputPlaceOfBirth', $placeOfBirth);
$doc->setValue('inputNationality', $nationality);

$doc->setValue('inputEdName', $edName);
$doc->setValue('inputEducationFinish', $educationFinish);
$doc->setValue('inputEducationSpeciality', $educationSpeciality);
$doc->setValue('inputEducationQualification', $educationQualification);
$doc->setValue('inputDiplom', $diplom);
$doc->setValue('inputNumOfDiplom', $numOfDiplom);
$doc->setValue('inputDateOfDiplom', $dateOfDiplom);

$doc->setValue('inputFamilyStatus', $familyStatus);
$doc->setValue('inputHusbandWife', $husbandWife);
$doc->setValue('inputChildren', $children);

$doc->setValue('inputPassport', $passport);
$doc->setValue('inputNumOfPassport', $numOfPassport);
$doc->setValue('inputPlaceOfIssue', $placeOfIssue);
$doc->setValue('inputFirstDate', $firstDate);
$doc->setValue('inputPersonalNumber', $personalNumber);
$doc->setValue('inputPlaceOfHome', $placeOfHome);
$doc->setValue('inputPlaceOfLiving', $placeOfLiving);
$doc->setValue('inputPhone', $phone);

$doc->setValue('inputDateOfEntry', $dateOfEntry);

$doc->setValue('initials', $initials);

$doc->saveAs($outputFile);

?>