<?php
class DB 
{
	private static $instance=NULL;
	public function getInstance()
	{
		if (!isset(self::$instance)) {
			$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			try {
				self::$instance = new PDO(
					'mysql:host=localhost;dbname=quanlynhasach','root','',$options);
			} catch (PDOException $ex) {
				die("lỗi kết nối");
			}
		}
		return self::$instance;
	}
}