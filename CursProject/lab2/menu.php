<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lab2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name_dish, dish_price, cook_time FROM `menu`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Название блюда" . "<br>";
    echo"\n" . $stroka['name_dish'] . "<br>"; 
    echo"Стоимось" . "<br>"; 
    echo"\n" . $stroka['dish_price'] . "<br>";
    echo"Время приготовления" . "<br>";
    echo"\n" . $stroka['cook_time'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>