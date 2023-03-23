<?php


	//echo "Точка входа в приложение index.php"; //Файл индекс является единой точкой входа в приложение.
	
	//Подключаем автозагрузчик Composer
	require_once __DIR__ . "/vendor/autoload.php";
	use app\controllers\AuthController;
	use app\controllers\SiteController;
	use app\core\Application;
	
	//Указываем пространство имен и создаем экземпляр класса Приложение
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();



	$config = [
		'db' => [
			'dsn' => $_ENV['DB_DNS'],
			'user' => $_ENV['DB_USER'],
			'password' => $_ENV['DB_PASSWORD'],
		]
	];

	$app = new Application(__DIR__, $config);
	$app->db->applyMigration();