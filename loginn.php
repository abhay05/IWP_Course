<?
require_once 'pdo.php';
if(isset($_POST['login']))
{
  $user=$_POST['usname'] ;
  $_SESSION['username']=$user;
  $pass=$_POST['upass'];
  if(empty($user) || empty($pass)){echo "Fill all fields";}
  else{

  $sql="Select * from users where username=:us and password=:up";

  $stmt=$pdo->prepare($sql);
  $stmt->execute(array(':us'=>$_POST['usname'] ,':up'=>$_POST['upass']));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  if($row->fetchColumn()>0){header("Location:autos.php");}
  else{echo "Password or username not correct\n";}
}
}
elseif (isset($_POST['cancel'])) {
  // code...
  header('Location:index.php');
}
?>

<html>
<head>
  <title>
    Login
  </title>
</head>

<body>
<div class="container">
  <h1>Please Log In</h1>
  <form action="#" method="post">
<label for="usname">Username</label>
<input type="text" id="usname" name="usname"><br/>
<label for="upass">Password</label>
<input type="password" id="upass" name="upass"/><br/>
<button name="login">Login</button>
<button name="cancel">Cancel</button>
  </form>
  <p style="font-size:0.8em">For a password hint, view source and find a password hint in the HTML comments.</p>
</div>
</body>
</html>
