<?php
	namespace app\core;
	class Database{
		public \PDO $pdo;
		public function __construct(array $config)
		{
			$dsn = $config['dsn'] ?? '';
			$user = $config['user'] ?? '';
			$password = $config['password'] ?? '';
			
			$this->pdo = new \PDO(
				$dsn,
				$user,
				$password
			);
			$this->pdo->setAttribute(
				\PDO::ATTR_ERRMODE,
				\PDO::ERRMODE_EXCEPTION
			);

		}
		public function applyMigration(){
			$this->createMigrationTable();
			
			$newMigrations = [];
			$files = scandir(Application::$ROOT_DIR.'/migrations');
			$toApplyMigrations = array_diff($files, $this->getAppliedMigrations());
			foreach ($toApplyMigrations as $migration){ 
				if ($migration === '.'||$migration === '..') continue;
				require_once Application::$ROOT_DIR.'/migrations/'.$migration;
				$className = pathinfo($migration, PATHINFO_FILENAME);
				$instance = new $className();
				$this->log("Applying migration $migration");
				$instance->up();
				$this->log("Applyed migration $migration");
				$newMigration[] = $migration;
			}
			if(!empty($newMigration)) $this->saveMigrations($newMigration);
			else $this->log("All migrations are applied");
		}

		public function createMigrationTable(){
			$this->pdo->exec("
				CREATE TABLE IF NOT EXISTS migrations(
					id INT AUTO_INCREMENT PRIMARY KEY,
					migration VARCHAR(255),
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
				) ENGINE=INNODB;
			");
		}
		public function getAppliedMigrations(){
			$sql = $this->pdo->prepare("SELECT migration FROM migrations");
			$sql->execute();

			return $sql->fetchAll(\PDO::FETCH_COLUMN);
		}
		public function saveMigrations(array $migrations){
			$str = implode(",", array_map(fn($m) => "('$m')", $migrations));
			$sql = $this->pdo->prepare("INSERT INTO migrations (migration) VALUE 
			  	$str
			");
			$sql->execute();

		}

		protected function log($message){
			echo '['.date('Y-m-d H:i:s') . '] - '.$message.PHP_EOL;
		}
	}