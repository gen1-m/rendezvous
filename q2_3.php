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

    if (isset($_GET['data'])) {
    $a = $_GET['data'];

    $result = mysqli_query($conn, "SELECT * FROM Booking WHERE b_no = '$a'");

    ?>

    <table class="query_table">
        <tr> <th>Booking number</th> <th>Booking date</th> <th>Check-in date</th> <th>Check-out date</th></tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["b_no"]; ?> </td>
        <td> <?php echo $array["book_date"]; ?> </td>
        <td> <?php echo $array["check_in"]; ?> </td>
        <td> <?php echo $array["check_out"]; ?> </td></tr>
        <?php } ?>
    
    </table>

    <?php } ?>




</body>


</html>