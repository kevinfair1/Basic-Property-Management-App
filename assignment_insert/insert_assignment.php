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
         <li><a href="../assignment_insert/">Insert new assignment</a></li>         
     </ul>
     <p class="menuList">Employees</p>
     <ul>
         <li><a href="../employees">Display Employees</a></li>
     </ul>
     
    </div>             
    
        <form action='index.php' method='post'>
            <input type='hidden' name='action' value='insert_new_assignment'>            
            
            <br><br>
        <label>Date Assigned:</label>
            <input type='text' name='date_assigned'>
            <br><br>
        
        <label>Owner First Name:</label>
            <input type='text' name='first_name'>
            <br><br>
        
        <label>Owner Last Name:</label>
            <input type='text' name='last_name'>
        <br><br>
        
        <label>Address:</label>
            <input type='text' name='address'>
        <br><br>
        
        <label>Phone Number:</label>
            <input type='text' name='phone_number'>
        <br><br>
        
        
        <label style="vertical-align: top;">Problem Description:</label>
        <textarea name='description' cols='50' rows='10'></textarea>
        
        <br><br>
        
        <label>Completed:</label>
        <select name='completed'>
            <option value="0">0 - No</option>
            <option value="1">1 - Yes</option>
        </select>
        <br><br>
        
        <label>Employee ID:</label>
            <select name='employee_id'>
                <?php foreach ($employees as $employee) : ?>
                <option value="<?php echo $employee['employeeID']; ?>"><?php echo $employee['firstName'].' '.$employee['lastName']; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
            
            <input type='submit' value='Insert Assignment'>
        </form>
   
    </div>
    <br>
    
</div>
</body>
</html>