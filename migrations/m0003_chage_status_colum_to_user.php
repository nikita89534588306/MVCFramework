<?php
	class m0003_chage_status_colum_to_user{
		public function up(){
			$db = \app\core\Application::$app->db;
			$sql = "ALTER TABLE `users` CHANGE `status` `status` TINYINT(4) NOT NULL DEFAULT '0';";
			$db->pdo->exec($sql);
		}
		public function down(){
			$db = \app\core\Application::$app->db;
			$sql = "ALTER TABLE `users` CHANGE `status` `status` TINYINT(4) NOT NULL;";
			$db->pdo->exec($sql);
		}
	}