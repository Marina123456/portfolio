<?
require("modelClass.php");

function myConnect(){
  	include("mysql_conf.php");
    try{       
     # MySQL через PDO_MYSQL 
 
     $DBH = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $user, $password); 
     $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     $DBH->exec('SET NAMES utf8');
	 
     return $DBH;
	}catch(PDOException $e) {  
          echo $e->getMessage();  
    
    }
}
function getCityFrom(){
	
	$DBH=myConnect();
	$str_query='Select c.key_city AS key_city, c.city AS city from city c
                WHERE EXISTS (SELECT * FROM way WHERE key_city_from=c.key_city)';
	$STH=$DBH->query($str_query);
	$STH->setFetchMode(PDO::FETCH_CLASS,'City');	//, 
	$res=$STH->fetchAll();
	foreach($res as $city)
    {
	  $result[] = $city;
    }
	$DBH=null;
    return $result; 
	
}
function getCityTo(){
	
	$DBH=myConnect();
	$str_query='Select c.key_city AS key_city, c.city AS city from city c
                WHERE EXISTS (SELECT * FROM way WHERE key_city_to=c.key_city)';
	$STH=$DBH->query($str_query);
	$STH->setFetchMode(PDO::FETCH_CLASS,'City');	//, 
	$res=$STH->fetchAll();
	foreach($res as $city)
    {
	  $result[] = $city;
    }
	$DBH=null;
    return $result; 
	
}
function mesto($mesta) {
    return (int)$mesta;
}
function infoAboutTrain(){	
	$DBH=myConnect(); 
	$str_query='SELECT way.key_way, t.num_train as numberTrain, way.num_way as numberWay, tt.type_train as typeTrain,
                     	c.city as otkuda, c1.city as kuda, way.dt_otravki as dtFrom, way.dt_pribit as dtTo 
						FROM way
						LEFT JOIN train t ON way.key_train = t.key_train
						LEFT JOIN type_train tt ON t.key_type_train = tt.key_type
						LEFT JOIN city c ON way.key_city_from = c.key_city
						LEFT JOIN city c1 ON way.key_city_to = c1.key_city'; 
   	$STH=$DBH->query($str_query);
	$STH->setFetchMode(PDO::FETCH_CLASS,'Train');	//, 
	$res=$STH->fetchAll();
	foreach($res as $train)
    {
        $STH_ar = $DBH->prepare('SELECT zm.num_mesta as mesta FROM zabr_mesta zm  WHERE zm.key_way=:kw');
        $STH_ar->bindParam(':kw',$train->key_way, PDO::PARAM_INT);
        $STH_ar->execute();
	    $res_ar=$STH_ar->fetchAll(PDO::FETCH_FUNC, "mesto");
		$train->zabronMesta=$res_ar;//
		$train->SetOpenMesta();
		$train->formateAllDate();
		$result[] = $train;
    }
	$DBH=null;
    return $result;
	
}
	
function search($key_cityOt,$key_cityTo,$dateWay,$orderField,$isDesc){
	$DBH=myConnect();
	$str_query='SELECT way.key_way, t.num_train as numberTrain,way.num_way as numberWay, tt.type_train as typeTrain,
                     	c.city as otkuda, c1.city as kuda, way.dt_otravki as dtFrom, way.dt_pribit as dtTo 
						FROM way
						LEFT JOIN train t ON way.key_train = t.key_train
						LEFT JOIN type_train tt ON t.key_type_train = tt.key_type
						LEFT JOIN city c ON way.key_city_from = c.key_city
						LEFT JOIN city c1 ON way.key_city_to = c1.key_city
						'; 
						
	$str_where=' Where ';
	if ($key_cityOt!='') $str_where=$str_where.'c.key_city=:key_city1 and ';
	if ($key_cityTo!='') $str_where=$str_where.'c1.key_city=:key_city2 and ';
	if ($dateWay!='') $str_where=$str_where.'DATE(way.dt_otravki)=:dateOt and ';
	$str_where=$str_where.'1=1'; 
	
	if ($orderField=='') $str_order='';
	    else {
			  $str_order=' Order by ';
			  if ($orderField=='cityOtpravka'){
				if ($isDesc!='') 
					$str_order=$str_order.'c.city DESC, c1.city DESC';
                else $str_order=$str_order.'c.city, c1.city';				
			  } else {
				  $str_order=$str_order.$orderField;
				 if ($isDesc!='') $str_order=$str_order." DESC";				  
			  }
			  
		}
	
	$STH=$DBH->prepare($str_query.$str_where.$str_order=$str_order);
	
    if ($key_cityOt!='') $STH->bindParam(':key_city1', $key_cityOt, PDO::PARAM_INT);
	if ($key_cityTo!='') $STH->bindParam(':key_city2', $key_cityTo, PDO::PARAM_INT);
	if ($dateWay!='') $STH->bindParam(':dateOt', $dateWay, PDO::PARAM_STR);
		
	$STH->execute();
	
	$STH->setFetchMode(PDO::FETCH_CLASS,'Train');	//, 
	$res=$STH->fetchAll();
	foreach($res as $train)
    {
        $STH_ar = $DBH->prepare('SELECT zm.num_mesta as mesta FROM zabr_mesta zm  WHERE zm.key_way=:kw');
        $STH_ar->bindParam(':kw',$train->key_way, PDO::PARAM_INT);
        $STH_ar->execute();
	    $res_ar=$STH_ar->fetchAll(PDO::FETCH_FUNC, "mesto");
		$train->zabronMesta=$res_ar;//
		$train->SetOpenMesta();
		$train->formateAllDate();
		$result[] = $train;
    }
	$DBH=null;
    return $result;
}
function addClientinDB($clientWay)
{
try{
	$DBH=myConnect(); 
	$str_query='INSERT INTO people ( Fam,Imya
									,Otchestvo,pol
									,dt_birth,grazhd
									,telephone,email
									,seria_passp,deistvuet_do
									)
									VALUES
									(:Fam,:Imya
									,:Otchestvo,:pol
									,:dt_birth,:grazhd
									,:telephone,:email
									,:seria_passp,:deistvuet_do
									)'; 
   	$STH=$DBH->prepare($str_query);
	$STH->bindParam(':Fam', $clientWay->fam, PDO::PARAM_STR);
	$STH->bindParam(':Imya', $clientWay->imya, PDO::PARAM_STR);
	$STH->bindParam(':Otchestvo', $clientWay->otchestvo, PDO::PARAM_STR);
	$STH->bindParam(':pol', $clientWay->pol, PDO::PARAM_STR);
	$STH->bindParam(':dt_birth', $clientWay->dt_birth, PDO::PARAM_STR);
	$STH->bindParam(':grazhd', $clientWay->grazhd, PDO::PARAM_STR);
	$STH->bindParam(':telephone', $clientWay->telephone, PDO::PARAM_STR);
	$STH->bindParam(':email', $clientWay->email, PDO::PARAM_STR);
	$STH->bindParam(':seria_passp', $clientWay->seria_passp, PDO::PARAM_STR);
	$STH->bindParam(':deistvuet_do', $clientWay->deistvuet_do, PDO::PARAM_STR);
	$STH->execute();
    $DBH=null;	
	return true;
	}catch (PDOException $e){
		    $DBH=null;
			return false;
		  }
}
function isClientInDB($seria_passp)
{
	$DBH=myConnect(); 
	$str_query='SELECT key_fio FROM people Where seria_passp=:ser'; 
   	$STH=$DBH->prepare($str_query);
	$STH->bindParam(':ser', $seria_passp, PDO::PARAM_INT);
	$STH->execute();
	$res=$STH->fetchColumn();
	if ($res==null)
		$res=-1;
	
	$DBH=null;	
	return $res;
}
function addZayavkaOnly($key_fio){
	try {
		$DBH=myConnect(); 
	    $str_query='INSERT INTO zayavka (key_fio,dt_create) VALUES (:key_fio,NOW())'; 
		$STH=$DBH->prepare($str_query);
		$STH->bindParam(':key_fio', $key_fio, PDO::PARAM_INT);	
		$STH->execute();
		$DBH=null;
		return true;
	    }
	    catch (PDOException $e) {
			   $DBH=null;
		       return false;
		       }
}
function getKeyZayavki()
{
	$DBH=myConnect(); 
	$str_query='SELECT max(key_zayavka) as key_zayavki FROM zayavka'; 
   	$STH=$DBH->prepare($str_query);
	$STH->execute();
	$res=$STH->fetchColumn();
	if ($res==null)
		$res=-1;
	
	$DBH=null;	
	return $res;
}

function addBronMesta($key_way, $num_mesta,$key_zayavka){
	try {
		$DBH=myConnect(); 
	    $str_query='INSERT INTO zabr_mesta (key_way, num_mesta,key_zayavka)
					VALUES ( :key_way ,:num_mesta,:key_zayavka)'; 
		$STH=$DBH->prepare($str_query);
		$STH->bindParam(':key_way', $key_way, PDO::PARAM_INT);	
		$STH->bindParam(':num_mesta', $num_mesta, PDO::PARAM_INT);	
		$STH->bindParam(':key_zayavka', $key_zayavka, PDO::PARAM_INT);	
		$STH->execute();
		$DBH=null;
		return true;
	    }
	    catch (PDOException $e) {
			   $DBH=null;
		       return false;
		       }
}

function addZayavkaDB($telephone,$email,$fam,$imya,$otchestvo,$dt_birth,$pol,$grazhd,$seria_passp,$deistvuet_do,$key_way,$arr_mesta){
	
	$clientWay=new Person($fam,$imya,$otchestvo,$pol,$dt_birth,$grazhd,$telephone,$email,$seria_passp,$deistvuet_do);

	if (isClientInDB($clientWay->seria_passp)==-1)
	    if (addClientinDB($clientWay)) 
		    $key_fio=isClientInDB($clientWay->seria_passp);
		     else return false;
	    else $key_fio=isClientInDB($clientWay->seria_passp);
			
	if (addZayavkaOnly($key_fio))
	    $key_zayavka=getKeyZayavki();
        else return false;
	try{
	    foreach ($arr_mesta as $num_mesta){
             addBronMesta($key_way, (int)$num_mesta,$key_zayavka);
         }
		 return true;
	    } catch(Exception $e) {
		          return false;
	              }
}
function allInfa(){  
    $DBH=myConnect(); 
	$str_query="Select z.key_zayavka, CONCAT(c.city,' - ',c2.city) AS train, zm.num_mesta,
						CONCAT(p.Fam,' ',p.Imya,' ',p.Otchestvo) AS fio, p.dt_birth, p.grazhd, p.seria_passp, p.deistvuet_do, p.pol,
						p.telephone, p.email
						from way w 
						LEFT JOIN zabr_mesta zm ON w.key_way = zm.key_way
						LEFT JOIN zayavka z ON zm.key_zayavka = z.key_zayavka
						LEFT JOIN people p ON z.key_fio = p.key_fio
						LEFT JOIN train t ON w.key_train = t.key_train
						LEFT JOIN city c ON w.key_city_from = c.key_city  AND w.key_way = zm.key_way
						LEFT JOIN city c2 ON w.key_city_to = c2.key_city  AND w.key_way = zm.key_way
						WHERE z.key_zayavka IS NOT null
						ORDER BY z.key_zayavka desc, zm.num_mesta "; 
   	$STH=$DBH->query($str_query);
	$STH->setFetchMode(PDO::FETCH_ASSOC);	
	$res=$STH->fetchAll();
	$DBH=null;
	return $res;
}
?>