<?php
	//Класс Модель обпределяет общую логику для всех моделей
	//вне зависимости от конкретной реализации
	namespace app\core;
	abstract class Model{

		public const RULE_REQUIRED = "required";
		public const RULE_EMAIL = "email";
		public const RULE_MIN = "min";
		public const RULE_MAX = "max";
		public const RULE_MATCH = "match";

		public function loadData($data){
			foreach($data as $nameInputParam => $valueParam){ //перебираем массив данных полученных из аргумента функции и...
				if(property_exists($this, $nameInputParam)){ //...проверяем есть ли внутри модели поле с именем совпадающим с именем текущего параметра 
					$this->{$nameInputParam} = $valueParam; //если есть кладем значение в соответсвующее поле
				}
			}
		}
		public array $errors = [];
		public function validate(){
			foreach($this->rules() as $attribute => $rules) { //итерируемся по всем атрибутам указанным в правилах валидации...
				$value = $this->{$attribute}; // и получаем значение введенное от пользователя
				foreach ($rules as $rule){ //далее перебираем все правила валидации
					if(is_array($rule) && !empty($rule[0])) $ruleName = $rule[0]; //если правило является массивом то имя правила хранится в элементе с первым индексом
					else if(is_string($rule)) $ruleName = $rule; //если строка то это и есть имя правила

					//далее идет логика для валидации
					if(
						$ruleName === self::RULE_REQUIRED //если атрибут обязательный
						&& !$value //и данных от пользователя нет
					){
						$this->addError($attribute, self::RULE_REQUIRED); //в массив в с ошибками добавляем ошибку "ПОЛЕ ОБЯЗАТЕЛЬНО" 
					}  
				}
			}
		}
		abstract function rules():array;
	}