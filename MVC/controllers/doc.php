<?php

class DocController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Basis Framework';
		renderView('header', $data);
		renderView('pages/doc', $data);
		renderView('footer', $data);
	}
	

}