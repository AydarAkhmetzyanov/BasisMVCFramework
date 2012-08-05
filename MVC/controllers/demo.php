<?php

class DemoController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Basis Framework';
		$data['posts'] = Posts::getPosts();
		renderView('header', $data);
		renderView('pages/demo', $data);
		renderView('footer');
	}
	
	public function post(){
	    if(isset($_POST['inputName']) and isset($_POST['inputPost'])){
		    Posts::addPost($_POST['inputName'], $_POST['inputPost']);
		}
	    
	}
	
}