<?php
require('../model/database.php');
require('../model/assignments_db.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'insert_assignment';
    }
}

if ($action == 'insert_assignment') { 
    $employees = get_employees();
    include('insert_assignment.php');
}

else if ($action == 'insert_new_assignment') {    
    $dateAssigned = filter_input(INPUT_POST, 'date_assigned');
    $ownerFirstName = filter_input(INPUT_POST, 'first_name');
    $ownerLastName = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $phoneNumber = filter_input(INPUT_POST, 'phone_number');
    $problemDescription = filter_input(INPUT_POST, 'description');
    $completed = filter_input(INPUT_POST, 'completed');
    $employeeID = filter_input(INPUT_POST, 'employee_id');
    
    insert_new_assignment($dateAssigned, $ownerFirstName, $ownerLastName,
        $address, $phoneNumber, $problemDescription, $completed, $employeeID);
    
    $assignments = get_assignments();
    include('../assignment_display/display_assignments.php');
}
?>