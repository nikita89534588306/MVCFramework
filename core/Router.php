<?php 
	namespace app\core;
	class Router{
		public Request $request;
		public function __construct(Request $request){
			$this->request = $request;
		}
		protected array $routes = []; //содержит в себе имя метода, путь и функцию обратного вызова
		
		public function get($path, $callback){
			$this->routes['get'][$path] = $callback;
		}

		//данная функция вызывает зарегистрированную функция обратного вызова в зависимости от параметров строки URI
		public function resolve(){ 
			$currentPath = $this->request->getPath();		//получем текущий путь
			$currentMethod = $this->request->getMethod();	//получем текущий метод
			
			//если существует функция обраного вызова для данного метода и маршрута
			//то присваеваем её переменной $callback
			//если такой функции нет то присваиваем переменной строку "Not found"
			$callback = $this->routes[$currentMethod][$currentPath] ?? "Not found";
			if($callback === "Not found") { //если функция не найдена
				echo "Not found"; //выводи сообщение об ошибке
				exit();	
			}
			else //иначе
				echo call_user_func($callback); //выводим то что вернет нам функция обратного вызова
				
		}

		
	}