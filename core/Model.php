<?php
	//Класс Модель обпределяет общую логику для всех моделей
	//вне зависимости от конкретной реализации
	namespace app\core;
	class Model{
		public function loadData($data){

		}
		public function validate(){

		}
		abstract function register();
	}