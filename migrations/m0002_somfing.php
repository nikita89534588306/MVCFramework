<?php 
	class m0002_something{
		public function up(){
			echo "Applying $this::class migration";
		}
		public function down(){
			echo "Down $this::class migration";
		}
 	}