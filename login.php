<?php
$page_title = "Авторизация на сайте";
require __DIR__ . '/header.php';
require "dbconnection.php";

if (isset($_POST['do_auth'])) {
	$err_message = array();
	$user = R::findOne('users', 'login = ?', array($_POST['login']));
	if ($user) {
		if (password_verify($_POST['password'], $user->password)) {
			$_SESSION['logged_user'] = $user;
			header('Location: index.php');
		} else {
			$err_message[] = 'Ошибка ввода пароля!';
		}
	} else {
		$err_message[] = 'Пользователь отсутствует в базе данных!';
	}
	if (!empty($err_message)) {
		echo '<div style="color: red; ">' . array_shift($err_message) . '</div><hr>';
	}
}
?>

<div class="container mt-2">
	<div class="row">
		<div class="col">
			<div class="absolute-center">
			<?php if (isset($_SESSION['logged_user'])) : ?>
					Вы вошли как <?php echo $_SESSION['logged_user']->name . " " . $_SESSION['logged_user']->family; ?></br>
					<a href="logout.php">Выйти</a>
				<?php else : ?>
					<h2>Авторизация на сайте</h2>
				<form action="login.php" method="post">
					<input type="text" class="form-control input-group" name="login" id="login" placeholder="Поле ввода логина" required><br>
					<input type="password" class="form-control input-group" name="password" id="pass" placeholder="Поле ввода пароля" required><br>
					<button class="btn btn-primary input-group" name="do_auth" type="submit">Авторизоваться</button>
				</form>
				<?php endif; ?>
				<br>
			</div>
		</div>
	</div>
</div>