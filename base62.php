<?php

class Base62 {
	static $base = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	static $base_size = 62;
	static $base_flip = array();
	
	static function get_base_flip() {
		if(self::$base_flip == array())
			self::$base_flip = array_flip(str_split(Base62::$base));
		return self::$base_flip;
	}

	static function encode($val) {
		$str = '';
		while($val>0) {
			$mod = $val % self::$base_size;
			$str = self::$base[$mod].$str;	
			$val = ($val-$mod)/self::$base_size;
		}
		return $str;
	}

	static function decode($str) {
		$val = 0;
		$base_arr = self::get_base_flip();
		$str_arr = array_reverse(str_split($str)); 
		foreach($str_arr as $key=>$value){ 
			$val += $base_arr[$value]*(pow(self::$base_size,$key));
		}	
		return $val;
	}
	
}


