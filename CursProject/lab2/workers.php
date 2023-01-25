<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lab2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name, telephon_number, address, age FROM `workers`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Имя" . "<br>";
    echo"\n" . $stroka['name'] . "<br>";
    echo"Номер телефона" . "<br>";
    echo"\n" . $stroka['telephon_number'] . "<br>";
    echo"Адресс" . "<br>";
    echo"\n" . $stroka['address'] . "<br>";
    echo"Возраст" . "<br>";
    echo"\n" . $stroka['age'] . "<br>";
echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>