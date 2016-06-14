<?php
include_once("mysql_conf.php");
$Link = mysql_connect ($host, $user, $password);
@mysql_query("SET NAMES $charset", $Link);
if  ($Link) $text="БД \"$name\"!";
	 else $cont_res=$cont_res."Не удалось подключиться к базе данных!";
$cont_res=$cont_res."nameDB=".$name." Результат: ";
mysql_select_db($name);	

function getOne($key_fio,$field_name){
	$sql_opisanie="Select $field_name from people where key_fio=$key_fio";	
	$result=mysql_query($sql_opisanie);	
	while ($row = mysql_fetch_assoc($result))
			$opisanie=$row[$field_name];
	mysql_free_result($result);	
	echo $opisanie;	
}	
function getProfession($key_fio){
	$sql_prof="Select prof from profession left join people on people.key_prof=profession.key_prof where key_fio=$key_fio";	
	$result=mysql_query($sql_prof);	
	while ($row = mysql_fetch_assoc($result))
			$prof=$row['prof'];
	mysql_free_result($result);	
	echo $prof;	
}	
function getPlace($key_fio){
	$sql_place="Select city, country from city 
	                                 left join country on city.key_country=country.key_country
									 left join people on people.key_city=city.key_city
									 where key_fio=$key_fio";	
	$result=mysql_query($sql_place);	
	while ($row = mysql_fetch_assoc($result))
			$place=$row['city'].", ".$row['country'];
	mysql_free_result($result);	
	echo $place;
}

function getBirthDay($key_fio){
	$sql_BirthDay="Select dt_birthday from people where key_fio=$key_fio";	
	$result=mysql_query($sql_BirthDay);	
	while ($row = mysql_fetch_assoc($result))
			$BirthDay=$row['dt_birthday'];
			
	$t=strtotime("$BirthDay"); 
	$y=date("Y",$t); //часы 
	$m=date("n",$t); //порядковый номер месяца
	$d=date("j",$t); //дни
	
	$array_month=array("января","февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября","ноября");
	echo $d." ".$array_month[$m-1]." ".$y.", ";
mysql_free_result($result);		
}

function getDataNonVis($key_fio){
	$sql_BirthDay="Select dt_birthday from people where key_fio=$key_fio";	
	$result=mysql_query($sql_BirthDay);	
	while ($row = mysql_fetch_assoc($result))
		   echo $row['dt_birthday'];
mysql_free_result($result);		
}

function getPhotos($key_fio){
	$sql_Photos="Select key_photo, photo from photo where photo.key_fio=$key_fio";
	$result=mysql_query($sql_Photos);
	$i=0;
		while ($row = mysql_fetch_assoc($result)){
		       if ($i==0)	
		          echo "<a href='#' class='currentPhoto'><img id='".$row['key_photo']."' src='".$row['photo']."' width='470' height='270'></a>";
			    else echo "<a href='#'><img id='".$row['key_photo']."' src='".$row['photo']."' width='470' height='270'></a>";
		}
	mysql_free_result($result);
}

///работа с лайками
if ($_GET['UpdateLikeCount'])
    {
		getCountLike($_GET['key_photo']);
	}
	
if ($_GET['isLiked'])
    {
		isLiked($_GET['ip_adress'],$_GET['key_photo']);
	}
if ($_GET['delLiked']){deleteLike($_GET['ip_adress'],$_GET['key_photo']);}
if ($_GET['setLiked']){setLike($_GET['ip_adress'],$_GET['key_photo']);}
	
function getCountLike($key_photo){
	$sql_Likes="Select count(key_likeP) as cnt_like from like_photo where key_photo=$key_photo";
	$result=mysql_query($sql_Likes);
	while ($row = mysql_fetch_assoc($result))
			echo $row['cnt_like'];
	mysql_free_result($result);
}

function isLiked($ip_adress,$key_photo){
	$sql_Likes="Select count(key_likeP) as liked from like_photo where IP='$ip_adress' and key_photo=$key_photo";
	$result=mysql_query($sql_Likes);	
	while ($row = mysql_fetch_assoc($result))
			echo $row['liked'];
		
	mysql_free_result($result);
}
function deleteLike($ip_adress,$key_photo){
	$sql_Likes="Delete from like_photo where IP='$ip_adress' and key_photo=$key_photo";
	$result=mysql_query($sql_Likes);	
			
	mysql_free_result($result);
}
function setLike($ip_adress,$key_photo){
	$sql_Likes="Insert into like_photo (IP, key_photo) values ('$ip_adress', $key_photo)";
	$result=mysql_query($sql_Likes);	
			
	mysql_free_result($result);
}
?>