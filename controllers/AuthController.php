<?php
	namespace app\controllers;
	use app\core\Controller;
	use app\core\Request;
	use app\models\RegisterModel;

	class AuthController extends Controller{
		public function login(){
			$this->setLayout("auth");
			return $this->render('login');
		}
		public function register(Request $request){
			
			
		$registerModel = new RegisterModel(); //создаем модель для регистрации 
		
		if($request->isPost()) { //если метод HTTP - POST
			$registerModel->loadData($request->getBody()); //загрузаем данные в модель (данные и Запроса)
		
			if($registerModel->validate()  	// если пройдена валидация
			&& $registerModel->register() 	//и данные добавленны в бд(метод register уникальный для модели регистрации и описан в нутри класса) 
			) return "Success";  //выводим сообщение об успешной регистрации
			
			echo "<pre>";
			var_dump($registerModel->errors);
			echo "</pre>";

			return $this->render('register', //если регистрация не пройдена то выводим форму регистрации заново
				//и передаем данные из модели в форму регистрации 
				['model' => $registerModel ]
			);
		}

		//вывод представления для метода GET
			$this->setLayout("auth");
			return $this->render('register',
				['model' => $registerModel ]
			);
		
	}
		
	}