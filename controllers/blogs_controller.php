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


		case 'create':
			//var_dump($_POST);
			$controller->create($_POST);
			break;

		case 'show':
			$controller->show();
			break;

		case 'edit':
			$controller->edit($_POST);
			break;

		case 'update':
			$controller->update($_POST,$id);
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

 		function create($blog_data){ 			
 			//echo 'create()が呼ばれました';

 			//モデルを呼び出す
 			$blog = new Blog();
 			$return=$blog->create($blog_data);
 			$action ='create';
 			header('Location: /seed_blog/blogs/index');
 		}

 		 function show(){
 			//echo 'add()が呼び出されました!<br>';
 			$blog = new Blog();
 			$showing=$blog->show();
 			$action = 'show';
 			require('views/layout/application.php');
 		}

 		function edit(){
 			$blog = new Blog();
 			$editing=$blog->edit();
 			$action = 'edit';
 			require('views/layout/application.php');
 		}

 		function update($update_data,$id){
 			$blog = new Blog();
 			$updating=$blog->update($update_data,$id);
 			$action = 'update';
 			header('Location: /seed_blog/blogs/index');

 		}
 	}

 ?>