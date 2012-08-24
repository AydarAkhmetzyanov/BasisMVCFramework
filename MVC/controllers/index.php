<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Basis Framework';
		renderView('header', $data);
		renderView('pages/index', $data);
		renderView('footer', $data);
	}
	

}