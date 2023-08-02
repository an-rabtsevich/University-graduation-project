<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/ControlCard.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/ControlCard_full.docx';

$doc->setValue('numOfPersonalFile', $numOfPersonalFile);

$doc->setValue('inputSurname', $surname);
$doc->setValue('inputName', $firstName);
$doc->setValue('inputPatronymic', $patronymic);

$doc->saveAs($outputFile);


?>