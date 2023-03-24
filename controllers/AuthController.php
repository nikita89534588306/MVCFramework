<?php
	namespace app\controllers;
	use app\core\Controller;
	use app\core\Request;
	use app\models\User;

	class AuthController extends Controller{
		public function login(){
			$this->setLayout("auth");
			return $this->render('login');
		}
		public function register(Request $request){
			
		$this->setLayout("auth");
		$registerModel = new User(); //создаем модель для регистрации 
		
		if($request->isPost()) { //если метод HTTP - POST
			$registerModel->loadData($request->getBody()); //загрузаем данные в модель (данные и Запроса)
		
			if($registerModel->validate()  	// если пройдена валидация
			&& $registerModel->register() 	//и данные добавленны в бд(метод register уникальный для модели регистрации и описан в нутри класса) 
			) return "Success";  //выводим сообщение об успешной регистрации
			
			return $this->render('register', //если регистрация не пройдена то выводим форму регистрации заново
				//и передаем данные из модели в форму регистрации 
				['model' => $registerModel ]
			);
		}

		//вывод представления для метода GET
			
			return $this->render('register',
				['model' => $registerModel ]
			);
		
	}
		
	}