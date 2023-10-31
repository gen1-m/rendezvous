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

    $result = mysqli_query($conn, "SELECT * FROM Employees WHERE emp_name = '$a'");

    ?>

    <table class="query_table">
        <tr> <th>SSN</th> <th>Name</th> <th>Age</th> <th>Contract Start</th> <th>Contract End</th></tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["ssn"]; ?> </td>
        <td> <?php echo $array["emp_name"]; ?> </td>
        <td> <?php echo $array["emp_age"]; ?> </td>
        <td> <?php echo $array["contract_start"]; ?> </td>
        <td> <?php echo $array["contract_end"]; ?> </td></tr>
        <?php } ?>
    
    </table>

    <?php } ?>




</body>


</html>
