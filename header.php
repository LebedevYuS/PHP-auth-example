<!DOCTYPE html>
<html lang="ru">

<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="btn-group">
			<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
				Меню
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="index.php">Главная страница</a>
				<a class="dropdown-item" href="login.php">Авторизация</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="signup.php">Регистрация</a>
			</div>
		</div>
	</nav>
</body>
