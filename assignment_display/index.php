<?php
require('../model/database.php');
require('../model/assignments_db.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_assignments';
    }
}

if ($action == 'list_assignments') {   
    
    
    $assignments = get_assignments();
    $employees = get_employees();
    
    include('display_assignments.php');
}

else if ($action == 'delete_assignment') {
    $assignmentID = filter_input(INPUT_POST, 'assignment_id');   
    if ($assignmentID == NULL || $assignmentID == FALSE) {
        $error = "Missing or incorrect product code.";
        include('../errors/error.php');
    } else { 
        delete_assigment($assignmentID);
       
    }
    $assignments= get_assignments();
    include('display_assignments.php');
}

else if ($action == 'update_assignment') {
    $assignmentID = filter_input(INPUT_POST, 'assignment_id');
    $assignmentUpdate = get_assignment_forUpdate($assignmentID);
    $employees = get_employees();
    include('update_assignment.php');
}

else if ($action == 'update_assignment_execute') {
    $assignmentID = filter_input(INPUT_POST, 'assignment_id');
    $dateAssigned = filter_input(INPUT_POST, 'date_assigned');
    $ownerFirstName = filter_input(INPUT_POST, 'first_name');
    $ownerLastName = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $phoneNumber = filter_input(INPUT_POST, 'phone_number');
    $problemDescription = filter_input(INPUT_POST, 'description');
    $completed = filter_input(INPUT_POST, 'completed');
    $employeeID = filter_input(INPUT_POST, 'employee_id');
    
    update_assignment($assignmentID, $dateAssigned, $ownerFirstName, $ownerLastName,
        $address, $phoneNumber, $problemDescription, $completed, $employeeID);
   
    $employees = get_employees();
    $assignments = get_assignments();
    include('display_assignments.php');
}

else if ($action == 'select_by_employee') {
    $employeeID = filter_input(INPUT_POST, 'employee_id');
    
    $assignments = display_by_employee($employeeID);
    $employees = get_employees();
    
    include('display_assignments.php');
}