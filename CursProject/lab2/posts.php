<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lab2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name, responsibilities FROM `posts`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
        echo"Имя" . "<br>";
    echo"\n" . $stroka['name'] . "<br>";
        echo"Должность" . "<br>";
            echo"\n" . $stroka['responsibilities'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>