
<?php include("includes/header.php"); ?>
<form action="orderschange.php" method="post">
      <p>
        <label for="id_client">id_client:</label>
        <input type="number" name="id_client" id="id_client">
    </p>
    <p>
        <label for="client_number">client_number:</label>
        <input type="text" name="client_number" id="client_number">
    </p>
    <p>
        <label for="id_post">id_post:</label>
        <input type="text" name="id_post" id="id_post">
    </p>
    <p>
        <label for="id_dish">id_dish:</label>
        <input type="text" name="id_dish" id="id_dish">
    </p>
    <p>
        <label for="price">price:</label>
        <input type="text" name="price" id="price">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="orders.php" ' > <br>
<br> <input class="button" value="Вернутся обратно" onClick='location.href="redirecting.php"'> <br>
</form>

<?php include("includes/footer.php"); ?>



<?php
if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "lab2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
$client_number = mysqli_real_escape_string($link, $_REQUEST['client_number']);
$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);
$id_dish = mysqli_real_escape_string($link, $_REQUEST['id_dish']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
 
// Attempt insert query execution
$sql = "INSERT INTO orders (id_client, client_number, id_post, id_dish, price) VALUES ('$id_client','$client_number', '$id_post', '$id_dish', '$price')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}
else {}
?>


<?php
if(isset($_POST["delete"])){
$link = mysqli_connect("localhost", "root", "", "lab2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
 
// Attempt delete query execution
$sql = "DELETE FROM orders WHERE id_client='$id_client'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>


<?php
if(isset($_POST["update"])){
$link = mysqli_connect("localhost", "root", "", "lab2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
$client_number = mysqli_real_escape_string($link, $_REQUEST['client_number']);
$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);
$id_dish = mysqli_real_escape_string($link, $_REQUEST['id_dish']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
 
// Attempt update query execution
$sql = "UPDATE orders SET client_number ='$client_number', id_post = '$id_post', id_dish = '$id_dish', price = '$price'  WHERE id_client='$id_client'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>