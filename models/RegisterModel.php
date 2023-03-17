<?php
	namespace app\models;
	use app\core\Model;
	
	class RegisterModel extends Model{
		public string $firstname;
		public string $lastname;
		public string $email;
		public string $password;
		public string $confirmPassword;

		public function rules():array{ //правила для валидации данных
			return [
				'firstname' => [self::RULE_REQUIRED], //поле firstname должно быть заполнено 
				'lastname' => [self::RULE_REQUIRED],
				'email' => [self::RULE_REQUIRED, self::RULE_EMAIL], //должен быть заполненым и должен содержать email адрес
				'password' => [
					self::RULE_REQUIRED, //должен быть заполненым
					[self::RULE_MIN. 'min' => 8], //минимальная длинна пароля 8 символов
					[self::RULE_MAX. 'min' => 24] //максимальная длинна 24
				],
				'confirmPassword' => [
					self::RULE_REQUIRED, //поле confirmPassword должно быть заполнено 
					[self::RULE_MATCH, 'match' => 'password'] //и совпадать с полем password 
				],
				
				
			];
		}
		
		public function register() { //функция регистрации данных пользователя в БД

		}
	}