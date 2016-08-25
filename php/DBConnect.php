<?php 

	public class DBConnect{

			private $host="localhost";
			private $user="root";
			private $password="root";
			private $dbName="Leave-Application";
			private $connect;

			public function DBConnect(){
				try{
					$db = new mysqli($host,$user,$password,$dbName);
					return $db;
				}catch( Exception $exception ){
					$exception->getMessage();
				}

		}

 ?>