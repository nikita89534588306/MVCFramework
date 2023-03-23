<?php 
	namespace app\core;
	class Application{
		public static $ROOT_DIR;
		public static Application $app;

		public Request $request;
		public Router $router;
		public Response $response;
		public Controller $controller;
		public Database $db;
		public function getController():\app\core\Controller
		{
			return $this->controller;
		}
		public function setController($setController):void
		{
			$this->controller = $setController;
		}
		public function __construct($rootPath, array $config){

			self::$ROOT_DIR = $rootPath;
			self::$app = $this;
			
			$this->request = new Request(); //создаем экземпляр класса Запрос(Request)
			$this->response = new Response();
			$this->router = new Router($this->request, $this->response); //создаем экземпляр класса Маршрутиризатор(Router) и передаем экземпляр класса Запрос для получения текущего состояния URI 
			$this->db = new Database($config['db']);
		}
		//данная функция выводи результат работы приложения
		public function run(){
			// echo "Приложение созданно!<br/>";
			// echo "Путь из URL строки : " .$request->getPath() ."<br/>"; 	// выводим URI(для отладки)
			// echo "Метод запроса : " .$request->method() ."<br/>"; // выводим метод запроса(для отладки)
			echo $this->router->resolve(); //данная функция выводит результат работы функции обратного вызова зарегистрированного в Маршрутиризаторе
			
		}
	}