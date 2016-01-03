<?php
header("Content-type: text/html; charset=utf-8");
$tid="";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$tid=$_POST['id'];
		// MYSQL
		$host="localhost";
		$root="zjwdb_421656";
		$pwd="Swj12345";
		$mydb="zjwdb_421656";
		/*$host="localhost";
		$root="root";
		$pwd="";*/
		//$mydb="article_db";
		$conn=new mysqli($host,$root,$pwd,$mydb);
		$conn->query("set names 'utf8'");
		if($conn->connect_error){
			die($conn->connect_error);
			// $arr=array('atitle'=>$host,'acontent'=>'asdaskdjhas','anowtime'=>'asasda','aplace'=>'asdas');
			// echo json_encode($arr);
		}else{

			$sql="SELECT title, content,nowtime,articleid,aplace FROM myarticle";
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