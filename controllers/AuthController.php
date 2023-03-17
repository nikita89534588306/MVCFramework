<?php
	namespace app\controllers;
	use app\core\Controller;
use app\core\Request;

	class AuthController extends Controller{
		public function login(){
			$this->setLayout("auth");
			return $this->render('login');
		}
		public function register(Request $request){
			// контроллер регистрации должен обрабатывать 2 метода - get и post,
			// по этому мы должны получить класс Запрос в качестве аргумента и
			// проанализировав метод выполняем действие
			if($request->isPost()) return "Hendeling data user";
			$this->setLayout("auth");
			return $this->render('register');
		}
		
	}