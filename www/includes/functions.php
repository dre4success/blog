<?php

	class Tools {

		public static function doesEmailExist($dbconn, $email){

			$result = false;

			$stmt = $dbconn->prepare("SELECT * FROM admin WHERE email=:em");
			$stmt->bindParam(':em', $email);
			$stmt->execute();

			$count = $stmt->rowCount();

			if($count > 0) {$result = true; }

			return $result;
		}

		public static function doAdminRegister($dbconn, $input){

			$stmt = $dbconn->prepare("INSERT INTO admin(firstname, lastname, email, hash)
									VALUES(:f, :l, :e, :h)");

			$data = [
						':f'=> $input['fname'],
						':l'=> $input['lname'],
						':e'=> $input['email'],
						':h'=> $input['password']
					];
			$stmt->execute($data);
		}

		public static function DisplayErrors($key, $value){

			$result = "";

			if(isset($key[$value])){
				$result = '<span class="err">'. $key[$value]. '</span>';
			}

			return $result;
		}

		public function redirect($loca){
			header("Location: ".$loca);
		}
}