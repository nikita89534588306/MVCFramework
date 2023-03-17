<?php 
	namespace app\core;
	class Request{
		public function __construct(){

		}
		public function getPath(){
			$path = $_SERVER['REQUEST_URI'] ?? '/'; //если в URI указан то помещаем его в переменнную $path,
													//иначе "/" - корневая директория
			if(strpos($path, '?') === false) //если в URI отсутствуют параметры передаваемые методом GET
				return $path; //возвращаем путь без изменения
			else return substr($path, 0, strpos($path, '?')); // удаляем параметры GET запроса и возвращаем строку
		}
		public function method(){
			return strtolower($_SERVER['REQUEST_METHOD']);
		}
		public function getBody(){
			$body = [];
			if($this->method() == 'get'){
				foreach($_GET as $key=>$value){
					$body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
				}
			}
			if($this->method() == 'post'){
				foreach($_POST as $key=>$value){
					$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
				}
			}
			return $body;
		}
		
	}