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
    <div id="tableData" style="width: 50%;">
        <table>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>                
            </tr>
            <?php foreach ($employees as $employee) :                
                ?>
            
            <tr>
                <td><?php echo $employee['employeeID']; ?></td>                
                <td class="right"><?php echo $employee['firstName'].' '.$employee['lastName']; ?></td>                
                
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <br>
    
</div>
</body>
</html>