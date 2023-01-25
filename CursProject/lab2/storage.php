<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lab2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT name_ingredient, count, data, price_ingredient FROM `storage`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Имя ингредиента" . "<br>";
    echo"\n" . $stroka['name_ingredient'] . "<br>";
    echo"Количество" . "<br>";
    echo"\n" . $stroka['count'] . "<br>";
    echo"Дата закупа" . "<br>";
    echo"\n" . $stroka['data'] . "<br>";
    echo"Цена" . "<br>";
    echo"\n" . $stroka['price_ingredient'] . "<br>";
echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>