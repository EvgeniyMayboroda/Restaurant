<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>

<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>ХААААААААААААЙ, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
</div>
<form>
<br> <input class="button" value="Меню" onClick='location.href="menu.php" ' > <br>
<br> <input class="button" value="Заказы" onClick='location.href="orders.php"'> <br>
<br> <input class="button" value="Должности" onClick='location.href="posts.php"'> <br>
<br> <input class="button" value="Склад" onClick='location.href="storage.php"'> <br>
<br> <input class="button" value="Работники" onClick='location.href="workers.php"'> <br>
<br> <input class="button" value="Редактировать базу данных" onClick='location.href="redirecting.php"'> <br>
</form>

<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
