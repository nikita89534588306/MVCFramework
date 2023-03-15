<?php 
	namespace app\core;
	class Router{
		public Request $request;
		public Response $response;
		public function __construct(Request $request, Response $response){
			$this->request = $request;
			$this->response = $response;
		}
		protected array $routes = []; //содержит в себе имя метода, путь и функцию обратного вызова
		
		public function get($path, $callback){
			$this->routes['get'][$path] = $callback;
		}
		public function post($path, $callback){
			$this->routes['post'][$path] = $callback;
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
				$this->response->setStatusCode(404);
				return $this->renderView("_404"); //выводи сообщение об ошибке
			}
			else if(is_string($callback)) {
				$nameView = $callback; //если строка то интерпритируем её как имя Представление
				return $this->renderView($nameView); //отрисовываем Представление по имени Представления
			}
			else return call_user_func($callback); //выводим то что вернет нам функция обратного вызова
		}

		public function renderView($nameView){
			$layoutContent = $this->layoutContent();
			$viewContent = $this->renderOnlyView($nameView); 
			return str_replace('{{content}}', $viewContent, $layoutContent);
		}

		protected function layoutContent(){
			ob_start();
			include_once Application::$ROOT_DIR."/views/layouts/main.php"; 
			return ob_get_clean();
		}
		protected function renderOnlyView($nameView){
			ob_start();
			include_once Application::$ROOT_DIR ."/views/$nameView.php"; 
			return ob_get_clean();
		}
	}