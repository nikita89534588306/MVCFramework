<?php
	namespace app\controllers;

	use app\core\Controller;
	use app\core\Request;

	class SiteController extends Controller{
		public function home(){
			$params = [
				'name' => "AssHole"
			];
			return $this->render('home', $params);
		}
		public function contact(){
			return $this->render('contact');
		}
		public function handleContact(Request $request){
			$body = $request->getBody();
			echo "<pre>";
			var_dump($body);
			echo "</pre>";
			return "Hendeling...";
		}
	}