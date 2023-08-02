<?php

$doc = new \PhpOffice\PhpWord\TemplateProcessor('../docTemplates/recruitment/AdditionalPersonalCard.docx');

$outputFile = '../docTemplates/recruitment/recruitment_full/AdditionalPersonalCard_full.docx';

$doc->setValue('inputSurname', $surname);
$doc->setValue('inputName', $firstName);
$doc->setValue('inputPatronymic', $patronymic);

$doc->saveAs($outputFile);


?>