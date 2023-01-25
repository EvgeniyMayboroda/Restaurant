
<?php include("includes/header.php"); ?>
<form action="workerschange.php" method="post">
      <p>
        <label for="id_worker">id_worker:</label>
        <input type="number" name="id_worker" id="id_worker">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="telephon_number">telephon_number:</label>
        <input type="text" name="telephon_number" id="telephon_number">
    </p>
    <p>
        <label for="address">address:</label>
        <input type="text" name="address" id="address">
    </p>
    <p>
        <label for="age">age:</label>
        <input type="text" name="age" id="age">
    </p>
     <p>
        <label for="id_post">id_post:</label>
        <input type="text" name="id_post" id="id_post">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="workers.php" ' > <br>
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
$id_worker = mysqli_real_escape_string($link, $_REQUEST['id_worker']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$telephon_number = mysqli_real_escape_string($link, $_REQUEST['telephon_number']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);
 
// Attempt insert query execution
$sql = "INSERT INTO workers (id_worker, name, telephon_number, address, age, id_post) VALUES ('$id_worker','$name', '$telephon_number', '$address', '$age', '$id_post')";
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

$id_worker = mysqli_real_escape_string($link, $_REQUEST['id_worker']);
 
// Attempt delete query execution
$sql = "DELETE FROM workers WHERE id_worker='$id_worker'";
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
$id_worker = mysqli_real_escape_string($link, $_REQUEST['id_worker']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$telephon_number = mysqli_real_escape_string($link, $_REQUEST['telephon_number']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);

 
// Attempt update query execution
$sql = "UPDATE workers SET name ='$name', telephon_number = '$telephon_number', address = '$address', age = '$age', id_post = '$id_post'  WHERE id_worker='$id_worker'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>