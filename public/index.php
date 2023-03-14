<?php 
	//echo "Точка входа в приложение index.php"; //Файл индекс является единой точкой входа в приложение.
	
	//Подключаем автозагрузчик Composer
	require_once __DIR__ . "/../vendor/autoload.php";
	//Указываем пространство имен и создаем экземпляр класса Приложение
	use app\core\Application;
	$app = new Application();
		
	//Зарегистрируем маршруты для приложения
	$app->router->get('/', function(){
		return "Home page";
	});

	$app->router->get('/contact', function(){
		return "About us";
	});

	$app->run(); //запуск приложение на выполнение
