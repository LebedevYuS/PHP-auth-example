<?php
$page_title = "Главная страница";
require __DIR__ . '/header.php';
require "dbconnection.php";
?>

<center>
	<h1>Главная страница</h1>
</center>

<div class="container mt-2">
	<div class="row">
		<div class="col">
			<div class="absolute-center">
				<br>
				<?php if (isset($_SESSION['logged_user'])) : ?>
					Вы вошли как <?php echo $_SESSION['logged_user']->name . " " . $_SESSION['logged_user']->family; ?></br>
					<a href="logout.php">Выйти</a>
				<?php else : ?>
					Вы не авторизованы <a href="login.php">войдите на сайт</a> или <a href="signup.php">зарегистрируйтесь</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>