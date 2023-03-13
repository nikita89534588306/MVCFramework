<?php 
	namespace app\core;
	class Application{
		public Request $request;
		public Router $router;
		public function __construct(){
			// echo "Приложение созданно!<br/>";
			$this->request = new Request(); //создаем экземпляр класса Запрос(Request)
				// echo "Путь из URL строки : " .$request->getPath() ."<br/>"; 	// выводим URI(для отладки)
				// echo "Метод запроса : " .$request->getMethod() ."<br/>"; // выводим метод запроса(для отладки)
			
			$this->router = new Router($this->request); //создаем экземпляр класса Маршрутиризатор(Router)
														//и передаем экземпляр класса Запрос для получения текущего состояния URI 
		}
	}