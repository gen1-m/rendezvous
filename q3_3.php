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

    $result = mysqli_query($conn, "SELECT * FROM Departments WHERE dep_name = '$a'");

    ?>

    <table class="query_table">
        <tr> <th>Department name</th> <th>Employees number</th> <th>Budget</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["dep_name"]; ?> </td>
        <td> <?php echo $array["emp_no"]; ?> </td>
        <td> <?php echo $array["budget"]; ?> </td></tr>
        <?php } ?>
    
    </table>

    <?php } ?>




</body>


</html>