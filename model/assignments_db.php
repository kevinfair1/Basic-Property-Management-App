<?php

function get_assignments() {
    global $db;
    $query = 'SELECT e.firstName, e.lastName, a.*
              FROM assignments a
              JOIN employees e ON e.employeeID = a.employeeID              
              ORDER BY assignmentID';
try {
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
} catch (PDOException $e) {
        display_db_error($e->getMessage());
    }    
}

function delete_assigment($assignmentID) {
    global $db;
    $query = 'DELETE FROM assignments
              WHERE assignmentID = :assignment_id';
try {
    $statement = $db->prepare($query);
    $statement->bindValue(':assignment_id', $assignmentID);
    $statement->execute();
    $statement->closeCursor();
} catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_assignment($assignmentID, $dateAssigned, $ownerFirstName, $ownerLastName,
        $address, $phoneNumber, $problemDescription, $completed, $employeeID) {
    global $db;
    $query = 'UPDATE assignments
            SET dateAssigned = :date_assigned,
            ownerFirstName = :owner_first_name,
            ownerLastName = :owner_last_name,
            address = :address,
            phoneNumber = :phone_number,
            problemDescription = :description,
            completed = :completed,
            employeeID = :employee_id
            WHERE assignmentID = :assignment_id';
    
    $dateForm = strtotime($dateAssigned);
    $releaseDateFormatted = date('Y-m-d', $dateForm);
                
    $statement = $db->prepare($query);
    $statement->bindValue(':date_assigned', $releaseDateFormatted);
    $statement->bindValue(':owner_first_name', $ownerFirstName);
    $statement->bindValue(':owner_last_name', $ownerLastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':phone_number', $phoneNumber);
    $statement->bindValue(':description', $problemDescription);
    $statement->bindValue(':completed', $completed);
    $statement->bindValue(':employee_id', $employeeID);
    $statement->bindValue(':assignment_id', $assignmentID);
    $statement->execute();
    $statement->closeCursor();
}

function get_assignment_forUpdate($assignmentID) {
    global $db;
    $query = 'SELECT * FROM assignments WHERE assignmentID = :assignment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':assignment_id', $assignmentID);
    $statement->execute();
    return $statement;
}

function insert_new_assignment($dateAssigned, $ownerFirstName, $ownerLastName,
        $address, $phoneNumber, $problemDescription, $completed, $employeeID) {
    global $db;
    $query = 'INSERT INTO assignments (dateAssigned, '
            . 'ownerFirstName, ownerLastName, address, phoneNumber, problemDescription, completed, employeeID)'
            . 'VALUES (:date_assigned, :owner_first_name, :owner_last_name, :address, :phone_number, :description, :completed, :employee_id)';
            
    $dateForm = strtotime($dateAssigned);
    $releaseDateFormatted = date('Y-m-d', $dateForm);
                
    $statement = $db->prepare($query);
    $statement->bindValue(':date_assigned', $releaseDateFormatted);
    $statement->bindValue(':owner_first_name', $ownerFirstName);
    $statement->bindValue(':owner_last_name', $ownerLastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':phone_number', $phoneNumber);
    $statement->bindValue(':description', $problemDescription);
    $statement->bindValue(':completed', $completed);
    $statement->bindValue(':employee_id', $employeeID);    
    $statement->execute();
    $statement->closeCursor();
}
            
function get_employees() {
    global $db;
    $query = 'SELECT * FROM employees
              WHERE employeeID > 0
              ORDER BY employeeID ASC';
try {
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
} catch (PDOException $e) {
        display_db_error($e->getMessage());
    }    
}


function display_by_employee($employeeID) {
    global $db;
    $query = 'SELECT e.firstName, e.lastName, a.*
              FROM assignments a              
              JOIN employees e ON e.employeeID = a.employeeID
              WHERE :employee_id = a.employeeID
              ORDER BY assignmentID';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':employee_id', $employeeID);
    $statement->execute();
    return $statement;
    
}
