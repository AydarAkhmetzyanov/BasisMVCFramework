<?php

class HTML
{

    public static function includeJS($fileName) {
        if(file_exists(ROOT. DS .'js/'. DS .$fileName.'.js')){
			$data = '<script src="'. APPDIR .'js/'.$fileName.'.js"></script>';
			return $data;
        } else {
            throw new Exception('JS not found, path: '. ROOT. DS .'js'. DS .$fileName.'.js');
        }
	}

	public static function includeCSS($fileName) {
        if(file_exists(ROOT. DS .'css'. DS .$fileName.'.css')){
			$data = '<link href="'. APPDIR .'css/'.$fileName.'.css" rel="stylesheet">';
			return $data;
        } else {
        	throw new Exception('CSS not found, path: '. ROOT. DS .'css'. DS .$fileName.'.css');
        }
	}
	
}
