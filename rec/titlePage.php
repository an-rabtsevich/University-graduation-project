<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/TitlePage.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/TitlePage_full.docx';

$doc->setValue('numOfPersonalFile', $numOfPersonalFile);

$doc->setValue('inputSurname', $surname);
$doc->setValue('inputName', $firstName);
$doc->setValue('inputPatronymic', $patronymic);

$doc->setValue('inputDateOfEntry', $dateOfEntry);

$doc->saveAs($outputFile);

//$downloadFile = 'TitlePage_full.docx';
//require 'saveFiles.php';
//saveFiles($outputFile, $downloadFile);
//unlink($outputFile);

?>