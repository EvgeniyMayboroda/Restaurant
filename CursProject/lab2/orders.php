<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lab2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT client_number, id_post, price FROM `orders`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
        echo"Номер клиента" . "<br>";
    echo"\n" . $stroka['client_number'] . "<br>";
        echo"Айди должности" . "<br>";
    echo"\n" . $stroka['id_post'] . "<br>";
        echo"Цена" . "<br>";
    echo"\n" . $stroka['price'] . "<br>";
     echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>