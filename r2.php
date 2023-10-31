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

           
 

    $result = mysqli_query($conn, "SELECT Customers.c_name, Booking.b_no FROM Customers, Booking, Make WHERE Make.c_id = Customers.c_id AND Make.b_id = Booking.b_id"); 


    ?>
   
    <table class="relation_table">

        <tr> <th>Customers name</th> <th>Booking number</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["c_name"]; ?> </td>
        <td> <?php echo $array["b_no"]; ?> </td><tr>
        <?php } ?>
    
    </table> <br> <br>


<button id="myBtn">Show Customers Table</button>


<div id="myModal" class="modal">

  <div class="modal-content">

    <span class="close">&times;</span>
    <p>
<?php    

$result = mysqli_query($conn, "SELECT * FROM Customers");

    ?>

    <table class="entity_table">
        <tr> <th>Name</th> <th>Phone</th> <th>Email</th> <th>ID proof</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["c_name"]; ?> </td>
        <td> <?php echo $array["phone"]; ?> </td>
        <td> <?php echo $array["email"]; ?> </td>
        <td> <?php echo $array["id_proof"]; ?> </td></tr>
        <?php } ?>
    
    </table>
</p>
</span>
</div>
</div>




<button id="myBtn1">Show Bookings Table</button>

<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    <span class="close1">&times;</span>
       <p><?php    

$result = mysqli_query($conn, "SELECT * FROM Booking");

    ?>

    <table class="entity_table">
        <tr> <th>Booking number</th> <th>Booking Date</th> <th>Check in</th> <th>Check out</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["b_no"]; ?> </td>
        <td> <?php echo $array["book_date"]; ?> </td>
        <td> <?php echo $array["check_in"]; ?> </td>
        <td> <?php echo $array["check_out"]; ?> </td></tr>
        <?php } ?>
    
    </table>
</p>
</span>
</div>
  </div>

<form action="successful.html">
  <label for="customer">Choose a customer:</label>
  <select name="customer" id="customer">
    <option value="one">Xhersila Olldashi</option>
    <option value="two">Flavia Tasellari</option>
    <option value="three">Sindi Tasellari</option>
    <option value="four">Alesia Hasanaj</option>
    <option value="five">Betty Smith</option>
    <option value="six">Brandon White</option>
    <option value="seven">Jessica Snow</option>
    <option value="eight">Ashley Gomez</option>
    <option value="nine">Drew Everett</option>
    <option value="ten">Madison Grey</option>
  </select> <br> <br>
 <label for="booking">Choose a booking:</label>
 <input type="number" name="booking" min="11" required>
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
