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
	}