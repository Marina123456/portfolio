
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function my_showHint(NameEl/*идентификатор html элемента*/,AdrEl/*Адрес php сценария*/  ,str/*Строка, которую нужно передать в php сценарий GET  */)
{
  
//alert(str+'&'+AdrEl+'=>'+NameEl);
if (AdrEl.length==0)
  { 
  document.getElementById(NameEl).innerHTML="";
  return;
  }
var xmlhttp = getXmlHttp();  

xmlhttp.onreadystatechange=function() 
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(NameEl).innerHTML=xmlhttp.responseText;
	//alert(xmlhttp.responseText);
    }
  }
if (str == '')
   {
		//xmlhttp.open("GET","BuildElement.php?AdrEl="+AdrEl,true);
		xmlhttp.open("GET",AdrEl,true);
		
   }
   else
   {
		//xmlhttp.open("GET","BuildElement.php?"+str+"&AdrEl="+AdrEl,true);
		xmlhttp.open("GET",AdrEl+'?'+str,true);
   }
	
   xmlhttp.send(); 
}




function  getMenu(id)
{
my_showHint('fast-menu','php/get_vert_Menu.php','id='+id);
}
function  getArticle(id)
{

my_showHint('body_area','php/getArticle.php',id);
}



