<?php
/**
 * Created by PhpStorm.
 * User: zilan
 * Date: 2016/12/26
 * Time: 21:54
 */
require ("../var/Typecho/Db.php");

	Class Recorder {
		public function _construct() {
			return true;
		}

		public function _deconstruct() {
			return true;
		}

		public function doit() {
			$this->resolve();
			return true;
		}

		public function resolve() {
			global $_SERVER;
			$ip = $this->ipaddress();
			$useragent = getenv("HTTP_USER_AGENT") ?  getenv("HTTP_USER_AGENT") : "Unknown";
			$time = date("Y-m-d H:i:s");
			var_dump($ip);
			var_dump($useragent);
			var_dump($time);
			die();
			//$this->record($ip, $useragent, $time);
		}

		public function record($ip = '0', $useragent = 'Unknow', $time='2016-03-20 00:00:00') {
			$db = Typecho_Db::get();
			$insert = $db->insert('access_log')
				->rows(array('ip' => $ip, 'user_agent' => $useragent, 'time' => $time));
			$db->query($insert);

		}

		public function ipaddress() {
			if(getenv("HTTP_CLIENT_IP"))
				$ip=getenv("HTTP_CLIENT_IP");
			else if(getenv("HTTP_X_FORWARDED_FOR"))
				$ip=getenv("HTTP_X_FORWARDED_FOR");
			else if(getenv("REMOTE_ADDR"))
				$ip=getenv("REMOTE_ADDR");
			else if(getenv("HTTP_X_REAL_IP"))
				$ip = getenv("HTTP_X_REAL_IP");
			else
				$ip="Unknow";
			return $ip;
		}

	}