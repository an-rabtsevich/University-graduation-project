<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/JobApplicationLetter.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/JobApplicationLetter_full.docx';

if ($sex === "Мужской") {
    $fullNameV = $nc->qFullName($surname, $firstName, $patronymic, NCL::$MAN, NCL::$VINITELN);
    $surnameR = $nc->qSecondName($surname, NCL::$MAN, NCL::$RODITLN);
}
else{
    $fullNameV = $nc->qFullName($surname, $firstName, $patronymic, NCL::$WOMAN, NCL::$VINITELN);
    $surnameR = $nc->qSecondName($surname, NCL::$WOMAN, NCL::$RODITLN);
}

$doc->setValue('fullNameV', $fullNameV);
$doc->setValue('surnameR', $surnameR);

$doc->setValue('inputSurname', $surname);

$doc->setValue('inputDateOfEntry', $dateOfEntry);

$doc->setValue('initials', $initials);

$doc->setValue('numOfOrder', $numOfOrder);

$jobPositionR = $nc->qFirstName($jobPosition, NCL::$MAN, NCL::$RODITLN);
$doc->setValue('inputJobPosition', $jobPositionR);

$doc->setValue('inputJobDepartment', $jobDepartment);
$doc->setValue('inputJobStart', $jobStart);

$doc->setValue('inputJobDateOfJobApplication', $jobDateOfJobApplication);
$doc->setValue('inputJobContractOrAgreement', $jobContractOrAgreement);
$doc->setValue('inputNumOfJobContractOrAgreement', $numOfJobContractOrAgreement);

$doc->saveAs($outputFile);

?>