<html>
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




    $result = mysqli_query($conn, "SELECT Booking.b_no, Spaces.s_name, Includes.room_fee FROM Booking, Spaces, Includes WHERE Includes.b_id = Booking.b_id AND Includes.s_id = Spaces.s_id"); 


    ?>
   
    <table class="relation_table">

        <tr> <th>Booking number</th> <th>Room name</th> <th>Room fee</th></tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["b_no"]; ?> </td>
        <td> <?php echo $array["s_name"]; ?> </td>
        <td> <?php echo $array["room_fee"]; ?> </td><tr>
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




<button id="myBtn1">Show Rooms Table</button>

<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    <span class="close1">&times;</span>
       <p><?php    

$result = mysqli_query($conn, "SELECT Spaces.s_name, Spaces.space_location, Spaces.space_description, Room.room_type FROM Spaces, Room WHERE Room.s_id = Spaces.s_id;");
    

    ?>

    <table class="entity_table">
        <tr> <th>Name</th> <th>Location</th> <th>Description</th> <th>Type</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["s_name"]; ?> </td>
        <td> <?php echo $array["space_location"]; ?> </td>
        <td> <?php echo $array["space_description"]; ?> </td>
        <td> <?php echo $array["room_type"]; ?> </td><tr>
        <?php } ?>

    
    </table>
</p>
</span>
</div>
  </div>

<form action="successful.html">
 <label for="booking">Choose a booking:</label>
<input type="number" name="booking" min="11" required> <br> <br>
  <label for="room">Choose a room:</label>
  <select name="room" id="room">
    <option value="one">Room 210</option>
    <option value="two">Room 212</option>
    <option value="three">Room 214</option>
    <option value="four">Room 211</option>
    <option value="five">Room 101</option>
    <option value="six">Room 216</option>
    <option value="seven">Room 102</option>
    <option value="eight">Room 215</option>
    <option value="nine">Room 103</option>
    <option value="ten">Room 213</option>
  </select> <br> <br>
<label for="room_fee">Choose a room fee:</label>
<input type="number" name="room_fee" min="0" required>
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
