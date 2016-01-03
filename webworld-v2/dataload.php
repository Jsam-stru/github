<?php
header("Content-type: text/html; charset=utf-8");
$tid=$tname=$ttime="";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$tid=$_POST['id'];
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
			$sql="SELECT title, content,nowtime,articleid,aplace FROM myArticle";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				while ($row=$result->fetch_assoc()) {
					$atitle=$row["title"];
					$acontent=$row["content"];
					$anowtime=$row["nowtime"];
					$articleid=$row["articleid"];
					$aplace=$row["aplace"];
					$arr=array('atitle'=>$atitle,'acontent'=>$acontent,'anowtime'=>$anowtime,'aplace'=>$aplace);
					$jarr=json_encode($arr);
					// 寻找数据库中匹配的文章索引
					if($tid==$articleid){
						echo $jarr;
					}
					// echo $row["title"]." ".$row["content"]. " ".$row["nowtime"];
				}
			}else{
				echo "0";
			}
			$conn->close();
		}

	}


?>