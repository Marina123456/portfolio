<?
require("function.php");
class Response {
      public $wordsForUser;
	  public $statusSuccess;
}
function is_ajax(){
 if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    return true;
  else
    return false;
}

//подключение к функции поиска
if (is_ajax() && !empty($_POST) && ($_POST["searchCon"])) {	
	searchCon($_POST["otkuda"],$_POST["kuda"],$_POST["searchDate"],'','');
   }
   
if (is_ajax() && !empty($_POST) && ($_POST["searchWithOrd"])) {	
	searchCon($_POST["otkuda"],$_POST["kuda"],$_POST["searchDate"],$_POST["orderField"],$_POST["isDesc"]);
   }  
if (is_ajax() && !empty($_POST) && ($_POST["Bron"])) {	
	
	//var_dump($_POST["arr_mesta"]);
	 if (addZayavka($_POST["telephone"],$_POST["email"],	$_POST["fam"],$_POST["imya"],$_POST["otchestvo"],$_POST["dt_birth"],$_POST["pol"],$_POST["grazhd"],$_POST["seria_passp"],$_POST["deistvuet_do"],$_POST["key_way"],$_POST["arr_mesta"]))
	     {
			$myResponse=new Response();
			$myResponse->wordsForUser="Ваша заявка принята! Электронный билет будет прислан Вам на почту!";
			$myResponse->statusSuccess=1;
			echo json_encode($myResponse);
		 }
	     else {
			  $myResponse=new Response();
			  $myResponse->wordsForUser="Произошла ошибка! Попробуйте отправить запрос позже!";
			  $myResponse->statusSuccess=0;
			  echo json_encode($myResponse);
		     }
   }  

function addZayavka($telephone,$email,$fam,$imya,$otchestvo,$dt_birth,$pol,$grazhd,$seria_passp,$deistvuet_do,$key_way,$arr_mesta){
	
	$telephone=trim($telephone);
	$email=trim($email);
	$fam=trim($fam);
	$imya=trim($imya);
	$otchestvo=trim($otchestvo);
	$dt_birth=trim($dt_birth);
	$pol=trim($pol);
	$grazhd=trim($grazhd);
	$seria_passp=trim($seria_passp);
	$deistvuet_do=trim($deistvuet_do);
	$key_way=trim($key_way);
	
	if ($dt_birth!='') $dt_birth=dateTranslate($dt_birth,"d/m/Y");
	if ($deistvuet_do!='') $deistvuet_do=dateTranslate($deistvuet_do,"d/m/Y");
	$myResponse=addZayavkaDB($telephone,$email,$fam,$imya,$otchestvo,$dt_birth,$pol,$grazhd,$seria_passp,$deistvuet_do,$key_way,$arr_mesta);
	return $myResponse;
}
   
function dateTranslate($dateStr,$strMask){
	$newDate=date_parse_from_format($strMask, $dateStr);
	$resDate='';
	$resDate=$resDate.$newDate["year"];
	if (strlen($newDate["month"]) <2) $resDate=$resDate."-"."0".$newDate["month"];
	else $resDate=$resDate."-".$newDate["month"];
	if (strlen($newDate["day"]) <2)  $resDate=$resDate."-"."0".$newDate["day"];
		else $resDate=$resDate."-".$newDate["day"];
	
	return $resDate;
}
function searchCon($key_cityOt,$key_cityTo,$dateWay,$orderField,$isDesc){
	if ($key_cityOt=='undefined') $key_cityOt='';		
	if ($key_cityTo=='undefined') $key_cityTo='';
	
	$key_cityOt=trim($key_cityOt);
	$key_cityTo=trim($key_cityTo);
	$dateWay=trim($dateWay);
	
	if ($dateWay!='') $dateWay=dateTranslate($dateWay,"m/d/Y");
	
	$row=search($key_cityOt,$key_cityTo,$dateWay,$orderField,$isDesc);
	require("../content.php");
	
}
?>