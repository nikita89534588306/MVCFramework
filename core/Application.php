<?php 
	namespace app\core;
	class Application{
		public Request $request;
		public function __construct(){
			// echo "Приложение созданно!<br/>";
			$request = new Request(); //создаем экземпляр класса Запрос(Request)
				echo $request->getPath() ."<br/>"; 	// выводим URI(для отладки)
				echo "Метод запроса : " .$request->getMethod() ."<br/>"; // выводим метод запроса(для отладки)
			
			
		}
	}