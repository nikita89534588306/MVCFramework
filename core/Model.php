<?php
	//Класс Модель обпределяет общую логику для всех моделей
	//вне зависимости от конкретной реализации
	namespace app\core;
	abstract class Model{
		public function loadData($data){
			foreach($data as $nameInputParam => $valueParam){ //перебираем массив данных полученных из аргумента функции и...
				if(property_exists($this, $nameInputParam)){ //...проверяем есть ли внутри модели поле с именем совпадающим с именем текущего параметра 
					$this->{$nameInputParam} = $valueParam; //если есть кладем значение в соответсвующее поле
				}
			}
		}
		public function validate(){

		}
		abstract function rules():array;
	}