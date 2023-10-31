<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="r1.css">
</head>

<body>

  <div class="myNavbar">
    <ul>
      <li> <a href="maintenance.html" class="about"> Maintenance Page </a> </li>
    </ul>
  </div> 

<?php 
    
 
    $dbhost = 'localhost';
    $user ='group6';
    $pass ='2XzjYn';
    $db ='group6';
    
    
    $conn= mysqli_connect('localhost', $user, $pass, $db);




$result = mysqli_query($conn, "SELECT Employees.emp_name, Departments.dep_name FROM Employees, Departments, Work_in WHERE Work_in.d_id = Departments.d_id AND Work_in.e_id = Employees.e_id ORDER BY Employees.e_id"); 

?>
 
    <table class="relation_table">

        <tr> <th>Employees name</th> <th>Department name</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["emp_name"]; ?> </td>
        <td> <?php echo $array["dep_name"]; ?> </td><tr>
        <?php } ?>
    
    </table> <br> <br>


<button id="myBtn">Show Employees Table</button>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><?php    

    $result = mysqli_query($conn, "SELECT * FROM Employees");

?>

    <table>
        <tr> <th>SSN</th> <th>Name</th> <th>Age</th> <th>Contract Start</th> <th>Contract End</th></tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["ssn"]; ?> </td>
        <td> <?php echo $array["emp_name"]; ?> </td>
        <td> <?php echo $array["emp_age"]; ?> </td>
        <td> <?php echo $array["contract_start"]; ?> </td>
        <td> <?php echo $array["contract_end"]; ?> </td></tr>
        <?php } ?>
    
</table>
</p>
</span>
</div>
 </div>




<button id="myBtn1">Show Departments Table</button>

<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    <span class="close1">&times;</span>
       <p><?php    

$result = mysqli_query($conn, "SELECT * FROM Departments");

    ?>

    <table>
        <tr> <th>Name</th> <th>Employees number</th> <th>Budget</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["dep_name"]; ?> </td>
        <td> <?php echo $array["emp_no"]; ?> </td>
        <td> <?php echo $array["budget"]; ?> </td></tr>
        <?php } ?>
    
    </table>
</p>
</span>
</div>
  </div>

<form action="successful.html">
  <label for="employee">Choose an employee:</label>
  <select name="employee" id="employee">
    <option value="one">David Brown</option>
    <option value="two">Amelie Swift</option>
    <option value="three">Christopher Johnson</option>
    <option value="four">Carl Harris</option>
<option value="five">Brenda Wilson</option>
<option value="six">Rebecca Carter</option>
<option value="seven">Bruno Graham</option>
<option value="eight">Justin Curtis</option>
<option value="nine">Alberto Patterson</option>
<option value="ten">Alicia Butler</option>
  </select> <br> <br>
 <label for="department">Choose a department:</label>
  <select name="department" id="department">
    <option value="nje">Front Office</option>
    <option value="dy">Housekeeping</option>
    <option value="tre">Kitchen</option>
    <option value="kater">Security</option>
<option value="pese">Human Resources</option>
<option value="gjashte">Marketing</option>
<option value="shtate">Food service</option>
<option value="tete">IT</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>


<script>

var modal = document.getElementById("myModal");


var btn = document.getElementById("myBtn");


var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}

var modal1 = document.getElementById("myModal1");

var btn1 = document.getElementById("myBtn1");

var span1 = document.getElementsByClassName("close1")[0];

btn1.onclick = function() {
  modal1.style.display = "block";
}

span1.onclick = function() {
  modal1.style.display = "none";
}


</script>

</body>
</html>
