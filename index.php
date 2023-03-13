<?php 
	//echo "Точка входа в приложение index.php"; //Файл индекс является единой точкой входа в приложение.
	
	//Подключаем автозагрузчик Composer
	require_once __DIR__ . "/vendor/autoload.php";
	//Указываем пространство имен и создаем экземпляр класса Приложение
		use app\core\Application;
		$app = new Application();
		