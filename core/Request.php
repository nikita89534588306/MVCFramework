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
		public function getMethod(){
			return strtolower($_SERVER['REQUEST_METHOD']);
		}
		
	}