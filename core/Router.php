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

		
	}