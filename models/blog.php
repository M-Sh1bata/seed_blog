<?php 

	//echo 'モデルblog.phpが呼び出されました';

	class Blog{

		//プロパティ（db接続オブジェクト）
		private $dbconnect = '';

		//コンストラクタ
		function __construct(){
			//DB接続ファイルを読み込む
			require('dbconnect.php');

			//DB接続設定の値をプロパティに代入
			$this->dbconnect = $db;

		}

		//一覧表示に必要なデータを取得
		function index(){

			//echo 'モデルのindex()が呼び出されました<br>';

			//SQLの記述（SELECT文）
			$sql = 'SELECT * FROM `blogs` WHERE `delete_flag`=0 ORDER BY `created` DESC';


			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(my_sqli_error($this->dbconnect));

			 //実行結果を取得し、配列に格納
			 // $blogs = mysqli_fetch_assoc($result);

			 $rtn = array();
			 while($result = mysqli_fetch_assoc($results)){
			 	$rtn[]=$result;
			 }

			//取得結果を残す
			 return $rtn;

			 // foreach ($blogs as $blog) {
			 // 	echo $id=htmlspecialchars($blogs['id']);
			 // 	echo $title=htmlspecialchars($blogs['title']);
			 // 	echo $body=htmlspecialchars($blogs['body']);
			 // 	echo $created=htmlspecialchars($blogs['created']);
			 // 	echo $modified=htmlspecialchars($blogs['modified']);
			 // }
		}
		function create($blog_data){

			$sql = sprintf("INSERT INTO `blogs` (`id`, `title`, `body`, `delete_flag`, `created`, `modified`) VALUES (NULL, '%s', '%s', '0', NOW(), CURRENT_TIMESTAMP)",
				$blog_data['title'],
				$blog_data['body']
				// mysqli_real_escape_string($this->dbconnect, $blog_data['title']),
				// mysqli_real_escape_string($this->dbconnect, $blog_data['body'])
				);


			// $sql = sprintf('SELECT * FROM `blogs` WHERE `delete_flag`=0 AND `id`=%d',
   //      	mysqli_real_escape_string($this->dbconnect, $id)
   //      	);

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(my_sqli_error($this->dbconnect));


			//取得結果を残す
			 return $results;
		}

		function show(){

			
			$params = explode('/', $_GET['url']);

			//２．パラメータの分解（リソース名、アクション名、オプションを取得）
			$resource=$params[0];
			$action = $params[1];
			$id = 0;

			if (isset($params[2])) {
				$id = $params[2];
			



			$sql = sprintf('SELECT * FROM `blogs` WHERE `delete_flag`=0 AND `id`=%d',
        	$id
        	);

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(my_sqli_error($this->dbconnect));

			 //実行結果を取得し、配列に格納
			 $blogs = mysqli_fetch_assoc($results);

			 // $rtn = array();
			 // while($result = mysqli_fetch_assoc($results)){
			 // 	$rtn[]=$result;

			 //取得結果を残す
			 return $blogs;
			 
			 }
			 else{
			 	header('Location:/seed_blog/blogs/index');
			 }
		}

		function edit(){
			$params = explode('/', $_GET['url']);

			//２．パラメータの分解（リソース名、アクション名、オプションを取得）
			$resource=$params[0];
			$action = $params[1];
			$id = 0;

			if (isset($params[2])) {
				$id = $params[2];
			



			$sql = sprintf('SELECT * FROM `blogs` WHERE `delete_flag`=0 AND `id`=%d',
        	$id
        	);

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(my_sqli_error($this->dbconnect));

			 //実行結果を取得し、配列に格納
			 $blogs = mysqli_fetch_assoc($results);

			 // $rtn = array();
			 // while($result = mysqli_fetch_assoc($results)){
			 // 	$rtn[]=$result;

			 //取得結果を残す
			 return $blogs;
			 
			 }
			 else{
			 	header('Location:/seed_blog/blogs/index');
			 }
		}


		function update($update_data,$id){
				$sql = sprintf("UPDATE `blogs` SET `title` = '%s', `body` = '%s' WHERE `blogs`.`id` = %d;",
				$update_data['title'],
				$update_data['body'],
				$id
				);


				// $sql = sprintf("INSERT INTO `blogs` (`id`, `title`, `body`, `delete_flag`, `created`, `modified`) VALUES (NULL, '%s', '%s', '0', NOW(), CURRENT_TIMESTAMP)",
				// $blog_data['title'],
				// $blog_data['body']
				// );


			// $sql = sprintf('SELECT * FROM `blogs` WHERE `delete_flag`=0 AND `id`=%d',
   //      	mysqli_real_escape_string($this->dbconnect, $id)
   //      	);

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(my_sqli_error($this->dbconnect));


			//取得結果を残す
			 return $results;
	
		}

		function delete($id){
				$sql = sprintf("UPDATE `blogs` SET `delete_flag` = 1 WHERE `blogs`.`id` = %d;",
				$id
				);


				// $sql = sprintf("INSERT INTO `blogs` (`id`, `title`, `body`, `delete_flag`, `created`, `modified`) VALUES (NULL, '%s', '%s', '0', NOW(), CURRENT_TIMESTAMP)",
				// $blog_data['title'],
				// $blog_data['body']
				// );


			// $sql = sprintf('SELECT * FROM `blogs` WHERE `delete_flag`=0 AND `id`=%d',
   //      	mysqli_real_escape_string($this->dbconnect, $id)
   //      	);

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(my_sqli_error($this->dbconnect));


			//取得結果を残す
			 return $results;

		}
	}
 ?>