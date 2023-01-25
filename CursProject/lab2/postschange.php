
<?php include("includes/header.php"); ?>
<form action="change.php" method="post">
      <p>
        <label for="id_post">id_post:</label>
        <input type="number" name="id_post" id="id_post">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="responsibilities">responsibilities:</label>
        <input type="text" name="responsibilities" id="responsibilities">
    </p>
    <p>
        <label for="requirements">requirements:</label>
        <input type="text" name="requirements" id="requirements">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="posts.php" ' > <br>
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
$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$responsibilities = mysqli_real_escape_string($link, $_REQUEST['responsibilities']);
$requirements = mysqli_real_escape_string($link, $_REQUEST['requirements']);
 
// Attempt insert query execution
$sql = "INSERT INTO posts (id_post, name, responsibilities, requirements) VALUES ('$id_post','$name', '$responsibilities', '$requirements')";
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

$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);
 
// Attempt delete query execution
$sql = "DELETE FROM posts WHERE id_post='$id_post'";
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

$id_post = mysqli_real_escape_string($link, $_REQUEST['id_post']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$responsibilities = mysqli_real_escape_string($link, $_REQUEST['responsibilities']);
$requirements = mysqli_real_escape_string($link, $_REQUEST['requirements']);
 
// Attempt update query execution
$sql = "UPDATE posts SET name ='$name', responsibilities = '$responsibilities', requirements = '$requirements' WHERE id_post='$id_post'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>