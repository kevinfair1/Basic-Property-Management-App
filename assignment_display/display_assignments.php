<?php include '../view/header.php'; ?>
<html>
<head>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <div id="spacer"></div>
<div id="mainPage">
    <div id="pageMenu">
     <p class="menuList">Menu</p>
     <ul>
         <li><a href="../index.php">Home</a></li>         
     </ul>
     <p class="menuList">Assignments</p>
     <ul>
         <li><a href='../assignment_display'>Display All Assignments</a></li>
         <li><a href='../assignment_insert'>Insert new assignment</a></li>         
     </ul>
     <p class="menuList">Employees</p>
     <ul>
         <li><a href="../employees">Display Employees</a></li>
     </ul>
     
    </div>
    
    <div id="tableData">
    <div>
        <form action="index.php" method="post">
        <input type="hidden" name="action" value="select_by_employee">
        <label>Select Assignments by Employee: </label>
        <select name="employee_id">
            <?php foreach ($employees as $employee) : ?>
                <option value="<?php echo $employee['employeeID']; ?>"><?php echo $employee['firstName'].' '.$employee['lastName']; ?></option>
                <?php endforeach; ?>
                <input type="submit" style="margin-left: 10px;" value="Display Results">
        </select>
    </form>
    </div>
        <table>
            <tr>
                <th>Assignment ID</th>
                <th>Date Assigned</th>
                <th>Owner Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Problem Description</th>
                <th>Completed<br> 0- No, 1- Yes</th>
                <th>Assigned<br>Employee</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($assignments as $assignment) :
                $dateForm = strtotime($assignment['dateAssigned']);
                $releaseDateFormatted = date('m/d/Y', $dateForm);
                ?>
            
            <tr>
                <td><?php echo $assignment['assignmentID']; ?></td>
                <td><?php echo $releaseDateFormatted; ?></td>
                <td class="right"><?php echo $assignment['ownerFirstName'].' '.$assignment['ownerLastName']; ?></td>
                <td><?php echo $assignment['address']; ?></td>
                <td><?php echo $assignment['phoneNumber']; ?></td>
                <td><?php echo $assignment['problemDescription']; ?></td>
                <td><?php echo $assignment['completed']; ?></td>
                <td><?php echo $assignment['firstName'].' '.$assignment['lastName']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="update_assignment">
                    <input type="hidden" name="assignment_id"
                           value="<?php echo $assignment['assignmentID']; ?>">
                    <input type="submit" value="Update">
                    </form></td>
                    
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_assignment">
                    <input type="hidden" name="assignment_id"
                           value="<?php echo $assignment['assignmentID']; ?>">
                    <input type="submit" value="Delete">
                    </form></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </div>
    </div
    <br>   

</body>
</html>