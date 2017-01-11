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
	}
 ?>