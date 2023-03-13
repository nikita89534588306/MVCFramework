<?php 
	namespace app\core;
	class Router{
		protected array $routes = []; //содержит в себе имя метода, путь и функцию обратного вызова
		public function get($path, $callback){
			$this->routes['get'][$path] = $callback;
		}
	}