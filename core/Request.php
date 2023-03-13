<?php 
	namespace app\core;
	class Request{
		public function __construct(){

		}
		public function getPath(){
			return "Путь из строки ULR";
		}
		public function getMethod(){
			return strtolower($_SERVER['REQUEST_METHOD']);
		}
		
	}