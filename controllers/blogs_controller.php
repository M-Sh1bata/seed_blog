<?php 
	// echo 'blogs_controllerが呼ばれました<br>';

		//モデルの呼び出し
	require('models/blog.php');
 	
	//コントローラーのクラスをインスタンス化
	$controller = new BlogsController();
	//$controller->index();
	//アクション名によって呼び出すメソッドを変える
	switch ($action) {
		case 'index':
			$controller->index();
			break;
		case 'add':
			$controller->add();
			break;

		default:
			# code...
			break;
	}


 	class BlogsController{
 		function index(){
 			// echo 'コントローラーのindex()が呼び出されました！<br>';

 			//モデルを呼び出す
 			$blog = new Blog();
 			$viewOptions=$blog->index();
 			$action = 'index';
 			// var_dump($viewOptions);
 			require('views/layout/application.php');
 		}

 		function add(){
 			//echo 'add()が呼び出されました!<br>';
 			$action = 'add';
 			require('views/layout/application.php');
 		}
 	}

 ?>