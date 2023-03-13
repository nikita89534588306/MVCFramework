<?php 
	namespace app\core;
	class Request{
		public function __construct(){
			// echo "Приложение созданно!<br/>";

		}
		public function getPath(){
			return "Путь из строки ULR";
		}
		public function getMethod(){
			return "Метод запроса...";
		}
		
	}