<?php
	namespace app\controllers;

use app\core\Application;
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
		$user = new User(); //создаем модель для регистрации 
		
		if($request->isPost()) { //если метод HTTP - POST
			$user->loadData($request->getBody()); //загрузаем данные в модель (данные и Запроса)
		
			if($user->validate()  	// если пройдена валидация
			&& $user->save() 		//и данные добавленны в бд(метод register уникальный для модели регистрации и описан в нутри класса) 
			){
				Application::$app->session->setFlash('success', 'Thanks for registering');
				Application::$app->response->redirect('/');  //перенаправляем на главную 
			}
			return $this->render('register', //если регистрация не пройдена то выводим форму регистрации заново
				//и передаем данные из модели в форму регистрации 
				['model' => $user ]
			);
		}

		//вывод представления для метода GET
			
			return $this->render('register',
				['model' => $user ]
			);
		
	}
		
	}