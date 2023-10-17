# University-graduation-project

## About The Project

I did this project for my university thesis on the topic “Development of an application for the HR department of an organization”.


The essence of the project is that an employee needs to reduce labor costs for working with personnel documents 
(such as dismissal orders, hiring orders, transfer from department to department, transfers to retirement).

## Usage

To log in to the system, use the login and password provided to the user.

<img src="https://i.ibb.co/ZVD73QY/ugp1.png" alt="Login" width="800px">

To hire an employee, go to the appropriate page. After entering all the necessary data about the new employee, the system generates documents on the employee’s 
admission (the title page of the personal file, a personal personnel record sheet, an addition to the personal sheet, a personal card, a personal file inventory, 
a personal card of a person liable for military service, a control card, a personal records log , employment order, employment contract) and enters it into the database.

<img src="https://i.ibb.co/FzxvZD7/ugp2.png" alt="general_info" width="800px">

For example, a job application order has been generated.

<img src="https://i.ibb.co/fvh4SYS/ugp32.png" alt="job_application_letter" width="800px">

If you need to fire an employee, go to the dismissal page. After selecting an employee from the database, the system generates documents on the employee’s dismissal 
(dismissal order; notification to the military registration and enlistment office about the dismissal of an employee registered with the military) and changes the 
employee’s status in the database to “Inactive”.

<img src="https://i.ibb.co/qgMxCgS/ugp4.png" alt="dismissal_page" width="800px">

<img src="https://i.ibb.co/N6tFCgv/ugp5.png" alt="dismissal_modal" width="800px">

A dismissal order is generated.

<img src="https://i.ibb.co/tP0Hv3N/ugp62.png" alt="dismissal_order" width="800px">

If you need to generate a list of employees who will reach retirement age after a given time, select the “Transfer to retirement” option. To do this, the user enters 
the period of time during which the employee retires. Afterwards, the system takes information about employees from the database, processes it and displays a list of 
employees who must reach retirement age within a specified period of time.

<img src="https://i.ibb.co/VWczcy0/ugp7.png" alt="retirement" width="800px">

If you need to create a list of employees liable for military service, select the option “Liable for military service”. 
Afterwards, the system analyzes all employees and generates a list of employees subject to military registration.

<img src="https://i.ibb.co/jhT5rKp/ugp8.png" alt="military" width="800px">

## Built With

<span><img src="https://img.shields.io/badge/PHP-%234f5b93?style=flat-square" alt="PHP"></span>
<span><img src="https://img.shields.io/badge/jQuery-%230868ac?style=flat-square" alt="jQuery"></span>
<span><img src="https://img.shields.io/badge/Ajax-%232687c7?style=flat-square" alt="Ajax"></span>
<span><img src="https://img.shields.io/badge/HTML-%23e44d26?style=flat-square" alt="HTML"></span>
<span><img src="https://img.shields.io/badge/CSS-%23264de4?style=flat-square" alt="CSS"></span>
<span><img src="https://img.shields.io/badge/Bootstrap-%238712fb?style=flat-square" alt="Bootstrap"></span>
<span><img src="https://img.shields.io/badge/SQL-black?style=flat-square" alt="SQL"></span>

## Developers

- [an-rabtsevich](https://github.com/an-rabtsevich)
