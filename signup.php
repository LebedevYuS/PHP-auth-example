<?php
$page_title = "Регистрация нового пользователя";
require __DIR__ . '/header.php';
require "dbconnection.php";

if (isset($_POST['do_signup'])) {
	$err_message = array();

	if (trim($_POST['login']) == '') {
		$err_message[] = "Необходимо ввести логин!";
	}

	if (trim($_POST['email']) == '') {
		$err_message[] = "Необходимо ввести E-mail";
	}

	if (trim($_POST['name']) == '') {
		$err_message[] = "Необходимо ввести имя";
	}

	if (trim($_POST['family']) == '') {
		$err_message[] = "Необходимо ввести фамилию";
	}
	if ($_POST['password'] == '') {
		$err_message[] = "Необходимо ввести пароль";
	}

	if ($_POST['password_2'] != $_POST['password']) {
		$err_message[] = "Пароли не совпадают!";
	}
	if (mb_strlen($_POST['login']) < 5 || mb_strlen($_POST['login']) > 90) {

		$err_message[] = "Длина логина не должна быть меньше 5 символов!";
	}
	if (mb_strlen($_POST['name']) < 3 || mb_strlen($_POST['name']) > 50) {
		$err_message[] = "Длина имени не должна быть меньше 3 и больше 50 символов!";
	}

	if (mb_strlen($_POST['family']) < 5 || mb_strlen($_POST['family']) > 50) {
		$err_message[] = "Длина фамилии не должна быть меньше 3 и больше 50 символов!";
	}

	if (mb_strlen($_POST['password']) < 2 || mb_strlen($_POST['password']) > 8) {
		$err_message[] = "Длина пароля должна быть от 2 до 8 символов!";
	}

	if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST['email'])) {

		$err_message[] = 'Неправильный формат адреса электронной почты!';
	}

	if (R::count('users', "login = ?", array($_POST['login'])) > 0) {

		$err_message[] = "Пользователь с таким логином уже существует!";
	}

	if (R::count('users', "email = ?", array($_POST['email'])) > 0) {

		$err_message[] = "Пользователь с такой электронной почтой уже существует!";
	}


	if (empty($err_message)) {
		$user = R::dispense('users');
		$user->login = $_POST['login'];
		$user->email = $_POST['email'];
		$user->name = $_POST['name'];
		$user->family = $_POST['family'];
		$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		R::store($user);
		echo '<div style="color: green; ">Успешная регистрация! Можно <a href="login.php">авторизоваться</a>.</div><hr>';
	} else {
		echo '<div style="color: red; ">' . array_shift($err_message) . '</div><hr>';
	}
}
?>

<div class="container mt-4">
	<div class="row">
		<div class="col">
			<div class="absolute-center">
				<h2>Регистрация нового пользователя</h2>
				<br>
				<form action="signup.php" method="post">
					<input type="text" class="form-control input-group" name="login" id="login" placeholder="Логин"><br>
					<input type="email" class="form-control input-group" name="email" id="email" placeholder="E-mail"><br>
					<input type="text" class="form-control input-group" name="name" id="name" placeholder="Имя" required><br>
					<input type="text" class="form-control input-group" name="family" id="family" placeholder="Фамилия" required><br>
					<input type="password" class="form-control input-group" name="password" id="password" placeholder="Пароль"><br>
					<input type="password" class="form-control input-group" name="password_2" id="password_2" placeholder="Повторите пароль"><br>
					<button class="btn btn-primary" name="do_signup" type="submit">Зарегистрироваться</button>
				</form>
				<br>
				<a href="index.php">Главная страница</a></p>
			</div>
		</div>
	</div>
</div>