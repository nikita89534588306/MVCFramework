<?php 
	namespace app\core;
	class Application{
		public Request $request;
		public function __construct(){
			// echo "Приложение созданно!<br/>";
			$request = new Request(); //создаем экземпляр класса Запрос(Request)
				echo $request->getPath(); 	// выводим URI(для отладки)
				echo $request->getMethod(); // выводим метод запроса(для отладки)
			
			
		}
	}