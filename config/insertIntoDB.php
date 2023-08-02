<?php

require 'connectDB.php';

mysqli_query($connect, "INSERT INTO `general_info` (`employee_id`, `personal_file_number`, `sex`, `surname`, `name`, `father_name`, `date_of_birth`, `place_of_birth`, `citizenship`) VALUES (NULL, '$numOfPersonalFile', '$sex', '$surname', '$firstName', '$patronymic', '$fullDateOfBirth', '$placeOfBirth', '$nationality')");

$employee_id = mysqli_insert_id($connect);

mysqli_query($connect, "INSERT INTO `education_info` (`education_id`, `e_id`, `education`, `name_of_ed_institution_and_location`, `date_of_entry`, `date_of_finish`, `faculty`, `speciality`, `qualification`, `diplom_series`, `diplom_number`, `diplom_date`) VALUES (NULL, '$employee_id', '$education', '$edName', '$educationStart', '$educationFinish', '$educationFaculty', '$educationSpeciality', '$educationQualification', '$diplom', '$numOfDiplom', '$dateOfDiplom')");

mysqli_query($connect, "INSERT INTO `family_info` (`family_id`, `e_id`, `family_status`, `husband_wife`, `children`) VALUES (NULL, '$employee_id', '$familyStatus', '$husbandWife', '$children')");

mysqli_query($connect, "INSERT INTO `passport_info` (`passport_id`, `e_id`, `passport_series`, `passport_number`, `passport_issued_by`, `passport_date_of_issue`, `passport_valid_up_to`, `personal_number`, `place_of_registration`, `place_of_living`, `phone_number`) VALUES (NULL, '$employee_id', '$passport', '$numOfPassport', '$placeOfIssue', '$firstDate', '$finalDate', '$personalNumber', '$placeOfHome', '$placeOfLiving', '$phone')");

mysqli_query($connect, "INSERT INTO `military_info` (`military_id`, `e_id`, `ticket`, `accounting_group`, `accounting_category`, `compound`, `military_rank`, `military_specialty`, `fitness_for_MS`, `name_of_MC`) VALUES (NULL, '$employee_id', '$numberOfMilitaryId', '$accountingGroup', '$accountingCategory', '$compound', '$militaryRank', '$numberOfMS', '$fitnessOfMS', '$nameOfTheMC')");

mysqli_query($connect, "INSERT INTO `recruitment_info` (`rec_id`, `e_id`, `num_of_order`, `position`, `department`, `start_date`, `date_of_application`, `contarct`, `num_of_contract`, `probation`, `contract_term`, `tariff_rate`, `add_tariff_rate`, `salary`, `hours_per_week`, `days_per_week`, `vacation`, `add_vacation`, `date_of_filling`) VALUES (NULL, '$employee_id', '$numOfOrder', '$jobPosition', '$jobDepartment', '$jobStart', '$jobDateOfJobApplication', '$jobContractOrAgreement', '$numOfJobContractOrAgreement', '$probationaryPeriod', '$contractPeriod', '$salaryFirstPart', '$salarySecondPart', '$salaryFinalPart', '$hoursPerWeek', '$daysPerWeek', '$vacationPerYear', '$additionalVacationPerYear', '$dateOfEntry')");

mysqli_query($connect, "INSERT INTO `dismissed_info` (`dism_id`, `e_id`, `is_dismissed`) VALUES (NULL, '$employee_id', 'false')");


?>