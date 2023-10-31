<html>
    
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="p.css">
</head>

<body>
  <div class="myNavbar">
    <ul>
      <li> <a href="search.html" class="about"> Search Page </a> </li>
    </ul>
  </div> 
    <?php 
    
    $dbhost = 'localhost';
    $user ='group6';
    $pass ='2XzjYn';
    $db ='group6';
    
    
    $conn= mysqli_connect('localhost', $user, $pass, $db);

    if (isset($_POST['signup'])) {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    $result = mysqli_query($conn, "SELECT b_no, check_in, check_out FROM Booking WHERE check_in >= '$checkin' AND check_out <= '$checkout'");
    $result1 = mysqli_query($conn, "SELECT b_no, check_in, check_out FROM Booking WHERE check_in >= '$checkin' AND check_out <= '$checkout'");

    $array = mysqli_fetch_assoc($result);

    if ($array != NULL ) {

    ?>

    <table class="entity_table">
        <tr> <th>Booking number</th> <th>Check-in date</th> <th>Check-out date</th></tr>
        <?php while ($a = mysqli_fetch_assoc($result1)) { ?>
        <?php $d = $a["b_no"]; ?>
        <tr><td> <a href="q2_3.php?data=<?=$d?>"> <?php echo $a["b_no"];?> </a> </td>
        <td> <?php echo $a["check_in"]; ?> </td>
        <td> <?php echo $a["check_out"]; ?> </td></tr>
        <?php } ?>
    
    </table>

    <?php } else {
        echo "<p class=\"error\">Error: Data Not Found</p>";
    } 
    
    } ?>







</body>


</html>