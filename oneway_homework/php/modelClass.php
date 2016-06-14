<?

class Person{  
    public $fam;  
	public $imya;
    public $otchestvo;
	public $pol;
	public $dt_birth;
	public $grazhd;
	public $telephone;
	public $email;
	public $seria_passp;
	public $deistvuet_do;    
  
    function __construct($f,$im,$ot,$p,$dt_b,$grand,$tel,$em,$ser_p,$deist) {  
        $this->fam = $f;  
        $this->imya = $im;  
        $this->otchestvo = $ot; 
        $this->pol = $p;	
        $this->dt_birth = $dt_b;	
		$this->grazhd = $grand;
		$this->telephone = $tel;	
        $this->email = $em;
        $this->seria_passp=$ser_p;
		$this->deistvuet_do=$deist;
    }        
	
}
class Train{
	public $key_way;
	public $numberTrain;
	public $numberWay;
	public $typeTrain;
	public $otkuda;
	public $kuda;
	public $dtFrom;
	public $dtTo;	
	
	public $zabronMesta= array();
	public $openMesta = array();
	public $allMesta = array();
	public $countOpenMest;
	
	function __construct() {
		for ($i = 0; $i <= 39; $i++){
			$this->allMesta[]=(int)$i+1;
		}
	}
	public function SetOpenMesta(){
		$this->openMesta = array_diff($this->allMesta,$this->zabronMesta);	
		$this->SetOkonchanieMest();
	}
	public function SetOkonchanieMest(){
		$countIn=count($this->openMesta);
		$str="";
		if ($countIn==1 or $countIn==21 or $countIn==31)
			$str=" место";
		if (($countIn>=5 and $countIn<=20) or ($countIn>=25 and $countIn<=30) or ($countIn>=35 and $countIn<=40))
			$str=" мест";
		if (($countIn>=2 and $countIn<=4) or ($countIn>=22 and $countIn<=24) or ($countIn>=32 and $countIn<=34))
			$str=" места";
		$this->countOpenMest=$countIn.$str;
	}
	public function formateDate($dateIn){
		$dateTodayStr=date("Y-m-d");

		$newDate=date_parse_from_format("Y-m-d H:i:s", $dateIn);
		
		$yearDate=$newDate["year"];
		$month_array=array("января", "февраля","марта","апреля","мая","июня","июля","августа", "сентября", "октября", "ноября","декабря");
		$monIndex=$newDate["month"]-1;
		$monStr=$month_array[$monIndex];
		 
		if (strlen($newDate["day"])<2)    $dayDate="0".$newDate["day"];
			else $dayDate=$newDate["day"];
		if (strlen($newDate["month"])<2)    $monDate="0".$newDate["month"];
			else $monDate=$newDate["month"];
		if (strlen($newDate["hour"])<2)   $hourDate="0".$newDate["hour"];
			else $hourDate=$newDate["hour"];
		if (strlen($newDate["minute"])<2) $minuteDate="0".$newDate["minute"];
			else $minuteDate=$newDate["minute"];
		if ($dateTodayStr==$newDate["year"]."-".$monDate."-".$dayDate)
			$strDate="";
			else {
				$dateToday = date_create($dateTodayStr);
				date_add($dateToday, date_interval_create_from_date_string('1 day'));
                $dateTodayStr=date_format($dateToday, 'Y-m-d');
				 if ($dateTodayStr==$newDate["year"]."-".$monDate."-".$dayDate)
				     $strDate=", завтра";
			         else $strDate=", ".$dayDate." ".$monStr;
			     }
		return $newDate["hour"].":".$minuteDate.$strDate;
		
	}
	public function formateAllDate(){
		
		$this->dtFrom=$this->formateDate($this->dtFrom);
		$this->dtTo=$this->formateDate($this->dtTo);
		
	}
}  
class City{
	public $key_city;
	public $city;
}
?>