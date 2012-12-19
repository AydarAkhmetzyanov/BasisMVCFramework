<?php

class Posts extends Model
{

    public static function addPost($name,$post){
	    if (!(empty($name)) and !(empty($post))){
		    global $creatives_siteDB;
			$data = array( 'name' => $name, 'posts' => $post );
            $STH = $creatives_siteDB->prepare("INSERT INTO demo (name, posts) values (:name, :posts)");  
            $STH->execute($data);
			return true;
		}
	}
	
		public static function getPosts(){
		global $creatives_siteDB;
		if ($creatives_siteDB!=null){
        $STH = $creatives_siteDB->query
		('SELECT name, posts from demo order by id DESC LIMIT 9');  
        $STH->setFetchMode(PDO::FETCH_ASSOC);
		return $STH;
		} else {
		return null;
		}
	}

}