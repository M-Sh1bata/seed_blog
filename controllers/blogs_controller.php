<?php 
	echo 'blogs_controllerが呼ばれました';

		//モデルの呼び出し
	require('models/blog.php');
 	
	//コントローラーのクラスをインスタンス化
	$controller = new BlogsController();
	$controller->index();

 	class BlogsController{
 		function index(){
 			echo 'コントローラーのindex()が呼び出されました！<br>';

 			//モデルを呼び出す
 			$blog = new Blog();
 			$blog->index();
 		}
 	}

 ?>