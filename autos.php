<?php
include 'pdo.php';
session_start();
if(isset($_POST['submit'])){
$make=$_POST['make'];
$year=$_POST['year'];
$mileage=$_POST['mileage'];

$sql="Insert into table autos('make','year','mileage') values(:x,:y,:z)";
$stmt=$pdo->prepare($sql);
$p=$stmt->execute(array(':x'=>$make,':y'=>$year,':z'=>$mileage));

}

elseif (isset($_POST['logout'])) {
  // code...
  header('Location:index.php');
}
?>

<html>
<head>
  <title>
Autos
</title>
</head>

<body>
  <div class="container">
    <h1>Tracking Autos for<!--?php echo $_SESSION['username'];?>--></h1>
    <form action="#"  method="post">
      <label for="make">Make </label>
        <input type="text" id="make" name="make"><br/>
        <label for="year">Year</label>
        <input type="date" id="year" name="year"><br/>
        <label for="mileage">Mileage </label>
        <input type="text" id="mileage" name="mileage"><br/>
        <button name='submit'> Add</button>
        <button name='logout'> Logout</button>
    </form><br/>
    <h2><b>Automobiles</b></h2>
    <div>
      <?php
      include 'pdo.php';
      if(isset($_POST['add']))
        //$sql="select * from autos";
        $stmt=$pdo->prepare("select * from autos");
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        echo "<ul type='CIRCLE'>";
        while($row=$stmt->fetchAll(PDO::FETCH_ASSOC))
        {
          $make=$_POST['make'];
          $year=$_POST['year'];
          $mileage=$_POST['mileage'];

          echo "<li>".$make."&nbsp".$year."&nbsp".$mileage."</li>";
        }
        echo "</ul>";
      ?>
    </div>
  </div>
</body>
</html>
