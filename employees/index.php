<?php
require('../model/database.php');
require('../model/assignments_db.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_employees';
    }
}

if ($action == 'list_employees') {   
    
    
    $employees = get_employees();
    
    include('employee_list.php');
}