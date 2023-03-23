<?php
	class m0002_add_password_to_users{
		public function up(){
			$db = \app\core\Application::$app->db;
			$sql = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;";
			$db->pdo->exec($sql);
		}
		public function down(){
			$db = \app\core\Application::$app->db;
			$sql = "ALTER TABLE users DROP COLUMN password;";
			$db->pdo->exec($sql);
		}
	}