
<?php include("includes/header.php"); ?>
<form action="menuchange.php" method="post">
      <p>
        <label for="id_dish">id_dish:</label>
        <input type="number" name="id_dish" id="id_dish">
    </p>
    <p>
        <label for="name_dish">name_dish:</label>
        <input type="text" name="name_dish" id="name_dish">
    </p>
    <p>
        <label for="id_ingredient">id_ingredient:</label>
        <input type="text" name="id_ingredient" id="id_ingredient">
    </p>
    <p>
        <label for="dish_price">dish_price:</label>
        <input type="text" name="dish_price" id="dish_price">
    </p>
    <p>
        <label for="cook_time">cook_time:</label>
        <input type="text" name="cook_time" id="cook_time">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="menu.php" ' > <br>
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
$id_dish = mysqli_real_escape_string($link, $_REQUEST['id_dish']);
$name_dish = mysqli_real_escape_string($link, $_REQUEST['name_dish']);
$id_ingredient = mysqli_real_escape_string($link, $_REQUEST['id_ingredient']);
$dish_price = mysqli_real_escape_string($link, $_REQUEST['dish_price']);
$cook_time = mysqli_real_escape_string($link, $_REQUEST['cook_time']);
 
// Attempt insert query execution
$sql = "INSERT INTO menu (id_dish, name_dish, id_ingredient, dish_price, cook_time) VALUES ('$id_dish','$name_dish', '$id_ingredient', '$dish_price', '$cook_time')";
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

$id_dish = mysqli_real_escape_string($link, $_REQUEST['id_dish']);
 
// Attempt delete query execution
$sql = "DELETE FROM menu WHERE id_dish='$id_dish'";
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
$id_dish = mysqli_real_escape_string($link, $_REQUEST['id_dish']);
$name_dish = mysqli_real_escape_string($link, $_REQUEST['name_dish']);
$id_ingredient = mysqli_real_escape_string($link, $_REQUEST['id_ingredient']);
$dish_price = mysqli_real_escape_string($link, $_REQUEST['dish_price']);
$cook_time = mysqli_real_escape_string($link, $_REQUEST['cook_time']);
 
// Attempt update query execution
$sql = "UPDATE menu SET cook_time ='$cook_time', name_dish = '$name_dish', id_ingredient = '$id_ingredient', dish_price = '$dish_price'  WHERE id_dish='$id_dish'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>