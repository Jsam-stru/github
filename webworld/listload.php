<?php
header("Content-type: text/html; charset=utf-8");
$tid="";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$tid=$_POST['lid'];
		// MYSQL
		$host="localhost";
		$root="root";
		$pwd="";
		$mydb="article_db";
		$conn=new mysqli($host,$root,$pwd,$mydb);
		$conn->query("set names 'utf8'");
		if($conn->connect_error){
			die($conn->connect_error);
		}else{
			$sql="SELECT title, content,listid FROM mylist";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				while ($row=$result->fetch_assoc()) {
					$atitle=$row["title"];
					$acontent=$row["content"];
					$listid=$row["listid"];
					$arr=array('atitle'=>$atitle,'acontent'=>$acontent);
					$jarr=json_encode($arr);
					// 寻找数据库中匹配的list索引
					if($tid==$listid){
						echo $jarr;
					}
				}
			}else{
				echo "0";
			}
			$conn->close();
		}

	}


?>