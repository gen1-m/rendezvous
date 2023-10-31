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
    $enumber = $_POST['enumber'];
    $budget = $_POST['budget'];

    $result = mysqli_query($conn, "SELECT dep_name FROM Departments WHERE emp_no > '$enumber' AND budget > '$budget'");
    $result1 = mysqli_query($conn, "SELECT dep_name FROM Departments WHERE emp_no > '$enumber' AND budget > '$budget'");

    $array = mysqli_fetch_assoc($result);

    if ($array != NULL ) {

    ?>

    <table class="entity_table">
        <tr> <th>Department name</th> </tr>
        <?php while ($a = mysqli_fetch_assoc($result1)) { ?>
        <?php $d = $a["dep_name"]; ?>
        <tr><td> <a href="q3_3.php?data=<?=$d?>"> <?php echo $a["dep_name"];?> </a> </td></tr>
        <?php } ?>
    
    </table>

    <?php } else {
        echo "<p class=\"error\">Error: Data Not Found</p>";
    } 
    
    }?>





</body>


</html>