<?php 
	namespace app\core;
	class Application{
		public static $ROOT_DIR;

		public Request $request;
		public Router $router;
		public function __construct($rootPath){

			self::$ROOT_DIR = $rootPath;
			
			$this->request = new Request(); //создаем экземпляр класса Запрос(Request)
			$this->router = new Router($this->request); //создаем экземпляр класса Маршрутиризатор(Router) и передаем экземпляр класса Запрос для получения текущего состояния URI 
		}
		//данная функция выводи результат работы приложения
		public function run(){
			// echo "Приложение созданно!<br/>";
			// echo "Путь из URL строки : " .$request->getPath() ."<br/>"; 	// выводим URI(для отладки)
			// echo "Метод запроса : " .$request->getMethod() ."<br/>"; // выводим метод запроса(для отладки)
			echo $this->router->resolve(); //данная функция выводит результат работы функции обратного вызова зарегистрированного в Маршрутиризаторе
			
		}
	}