<?php
namespace Lib;

class Text {
	public static function camelizeByDots($str){
		return implode('', array_map(function($part){
			return ucfirst($part);
		}, explode('.', $str)));
	}
}
?>