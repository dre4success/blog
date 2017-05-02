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

		public static function redirect($loca){
			header("Location: ".$loca);
		}

		public static function adminLogin($dbconn, $input){

			$result = [];

			$stmt = $dbconn->prepare("SELECT admin_id, firstname, hash FROM admin WHERE email=:em");
			$stmt->bindParam(':em', $input['email']);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_BOTH);
			$count = $stmt->rowCount();

			if($count != 1 || password_verify($input['password'], $row['hash'])){

				Tools::redirect("admin_login.php?msge=invalid username or password");
				exit();

			} else
			{
				$result = true;
				$result = $row;
			}

			return $result;
		}

		public static function culNav($page){

		$curPage = basename($_SERVER['SCRIPT_FILENAME']);

		if($curPage == $page) {
			echo 'class="selected"';
		}
	}

	public static function insertIntoPost($dbconn, $input, $adminID){

		$stmt = $dbconn->prepare("INSERT INTO post(admin_id, title, body, date)
								VALUES(:a, :t, :b, now())");
		$data = [
					':a'=> $adminID,
					':t'=> $input['title'],
					':b'=> $input['content']
				];
		$stmt->execute($data);
	}

	public static function LoginCheck() {
		if(!isset($_SESSION['id'])) {

			header("Location:admin_login.php");
		}
	}
}