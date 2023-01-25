
<?php include("includes/header.php"); ?>
<form action="storagechange.php" method="post">
      <p>
        <label for="id_ingredient">id_ingredient:</label>
        <input type="number" name="id_ingredient" id="id_ingredient">
    </p>
    <p>
        <label for="name_ingredient">name_ingredient:</label>
        <input type="text" name="name_ingredient" id="name_ingredient">
    </p>
    <p>
        <label for="count">count:</label>
        <input type="text" name="count" id="count">
    </p>
    <p>
        <label for="data">data:</label>
        <input type="text" name="data" id="data">
    </p>
    <p>
        <label for="price_ingredient">price_ingredient:</label>
        <input type="text" name="price_ingredient" id="price_ingredient">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="storage.php" ' > <br>
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
$id_ingredient = mysqli_real_escape_string($link, $_REQUEST['id_ingredient']);
$name_ingredient = mysqli_real_escape_string($link, $_REQUEST['name_ingredient']);
$count = mysqli_real_escape_string($link, $_REQUEST['count']);
$data = mysqli_real_escape_string($link, $_REQUEST['data']);
$price_ingredient = mysqli_real_escape_string($link, $_REQUEST['price_ingredient']);
 
// Attempt insert query execution
$sql = "INSERT INTO storage (id_ingredient, name_ingredient, count, data, price_ingredient) VALUES ('$id_ingredient','$name_ingredient', '$count', '$data', '$price_ingredient')";
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

$id_ingredient = mysqli_real_escape_string($link, $_REQUEST['id_ingredient']);
 
// Attempt delete query execution
$sql = "DELETE FROM storage WHERE id_ingredient='$id_ingredient'";
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
$id_ingredient = mysqli_real_escape_string($link, $_REQUEST['id_ingredient']);
$name_ingredient = mysqli_real_escape_string($link, $_REQUEST['name_ingredient']);
$count = mysqli_real_escape_string($link, $_REQUEST['count']);
$data = mysqli_real_escape_string($link, $_REQUEST['data']);
$price_ingredient = mysqli_real_escape_string($link, $_REQUEST['price_ingredient']);

 
// Attempt update query execution
$sql = "UPDATE storage SET name_ingredient ='$name_ingredient', count = '$count', data = '$data', price_ingredient = '$price_ingredient'  WHERE id_ingredient='$id_ingredient'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>