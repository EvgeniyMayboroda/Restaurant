<?php include("includes/header.php"); ?>

<form>
	Выберете таблицу, которую хотите редактировать
<br> <input class="button" value="Меню" onClick='location.href="menuchange.php" ' > <br>
<br> <input class="button" value="Заказы" onClick='location.href="orderschange.php"'> <br>
<br> <input class="button" value="Должности" onClick='location.href="postschange.php"'> <br>
<br> <input class="button" value="Склад" onClick='location.href="storagechange.php"'> <br>
<br> <input class="button" value="Работники" onClick='location.href="workerschange.php"'> <br>
<br> <input class="button" value="Вернутся обратно" onClick='location.href="intropage.php"'> <br>
</form>


<?php include("includes/footer.php"); ?>