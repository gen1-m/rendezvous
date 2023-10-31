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

           
 


    $result = mysqli_query($conn, "SELECT Booking.b_no, Payment.invoice_no FROM Booking, Payment, Requires WHERE Requires.b_id = Booking.b_id AND Requires.p_id = Payment.p_id"); 


    ?>
   
    <table class="relation_table">

        <tr> <th>Booking number</th> <th>Invoice number </th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["b_no"]; ?> </td>
        <td> <?php echo $array["invoice_no"]; ?> </td><tr>
        <?php } ?>
    
    </table> <br> <br>


<button id="myBtn">Show Bookings Table</button>


<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close">&times;</span>
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




<button id="myBtn1">Show Payments Table</button>

<div id="myModal1" class="modal1">


  <div class="modal-content1">
    <span class="close1">&times;</span>
       <p><?php    

    $result = mysqli_query($conn, "SELECT * FROM Payment");

    ?>

    <table class="entity_table">
        <tr> <th>Invoice number</th> <th>Currency</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["invoice_no"]; ?> </td>
        <td> <?php echo $array["currency"]; ?> </td></tr>
        <?php } ?>
    
    </table>
</p>
</span>
</div>
  </div>


<form action="successful.html" method="post">
Choose a booking: <input type="number" name="booking" min="11" required> <br> <br>
Choose an invoice: <input type="number" name="invoice" required> <br>
<input type="submit" name="signup">
</form>

<?php

if (isset($_POST['signup'])) {
$booking = $_POST['booking']; 
$invoice = $_POST['invoice']; 


if ($booking == '' || $invoice == '') {
echo 'Information cannot be empty';
}
else {
header("Location:successful.html");
}
}
?>

<script>
// Get the modal
var modal = document.getElementById("myModal");


// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
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
