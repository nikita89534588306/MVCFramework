<?php 
	namespace app\core;
	class Application{
		public Request $request;
		public Router $router;
		public function __construct(){
			
			$this->request = new Request(); //создаем экземпляр класса Запрос(Request)

			$this->router = new Router($this->request); //создаем экземпляр класса Маршрутиризатор(Router)
														//и передаем экземпляр класса Запрос для получения текущего состояния URI 
		}
		//данная функция выводи результат работы приложения
		public function run(){
			// echo "Приложение созданно!<br/>";
			// echo "Путь из URL строки : " .$request->getPath() ."<br/>"; 	// выводим URI(для отладки)
			// echo "Метод запроса : " .$request->getMethod() ."<br/>"; // выводим метод запроса(для отладки)
			$this->router->resolve(); //данная функция выводит результат работы функции обратного вызова зарегистрированного в Маршрутиризаторе
			
		}
	}