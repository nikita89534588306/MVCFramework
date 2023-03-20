<?php 
	//echo "Точка входа в приложение index.php"; //Файл индекс является единой точкой входа в приложение.
	
	//Подключаем автозагрузчик Composer
	require_once __DIR__ . "/../vendor/autoload.php";
	//Указываем пространство имен и создаем экземпляр класса Приложение

	use app\controllers\AuthController;
	use app\controllers\SiteController;
	use app\core\Application;

	$app = new Application(dirname(__DIR__));
		
	//Зарегистрируем маршруты для приложения
	$app->router->get('/', [SiteController::class, 'home']);
	$app->router->get('/contact', [SiteController::class, 'contact']);
	$app->router->post('/contact', [SiteController::class, 'handleContact']);

	$app->router->get('/login', [AuthController::class, 'login']);
	$app->router->post('/login', [AuthController::class, 'login']);
	$app->router->get('/register', [AuthController::class, 'register']);
	$app->router->post('/register', [AuthController::class, 'register']);



	$app->run(); //запуск приложение на выполнение
