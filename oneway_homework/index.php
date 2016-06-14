﻿<html>
	 <head>
		 <script src="./js/scripts.js"></script>
		 <script src="./js/jquery-1.4.4.min.js"></script>
		 <script src="./js/ajax_function.js"></script>
		 <link rel="stylesheet"  type="text/css" href="./css/style.css"/>
		 <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		 
		 <!--для календаря-->
		 <link rel = 'stylesheet' href = './css/jquery-ui.min.css'>
		 <link rel = 'stylesheet' href = './css/jquery-ui.structure.min.css'>
		 <link rel = 'stylesheet' href = './css/jquery-ui.theme.min.css'>
		 <script src = './js/external/jquery/jquery.js'></script>
		 <script src = './js/jquery-ui.min.js'></script>
		 
		 <!--адаптивная верстка-->
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 
		 
		 <!--валидация-->
		 <script src="./js/jquery-1.6.3.js" type="text/javascript" charset="utf-8"></script>
		 <script src="./js/jquery.valid8.js" type="text/javascript" charset="utf-8"></script>
		 
		 <!--маска ввода-->
		 <script type="text/javascript" src="./js/jquery.maskedinput-1.2.2-co.min.js"></script>
		 
		 
		 
	 </head>
	 <body>
		 <div class="allInfo">
			 <div class="header">
				<!-- <img class="logo" type="image/svg+xml">src="./icons/tickets-logo.svg"  -->
					
				<svg class="logo" width="115px" height="32px" viewBox="0 0 115 32" version="1.1">
				     <g id="home" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
						<g id="tickets" sketch:type="MSArtboardGroup" transform="translate(-410.000000, -30.000000)" fill="#FF83D2">
							<g id="top" sketch:type="MSLayerGroup" transform="translate(410.000000, 30.000000)">
								<path d="M4.42472917,11.3410534 C6.1430706,11.2980949 7.86141203,12.02839 7.86141203,11.1262607 C7.86141203,10.26709 5.02614867,9.96638028 4.42472917,9.83750467 L4.42472917,9.7515876 C11.469929,7.56070228 18.7728801,6.57265596 26.1617482,6.44378035 L21.8658947,11.9424729 C19.0735898,15.5080314 11.1692193,25.5173702 11.1692193,29.7702652 C11.1692193,30.9731042 12.4150168,31.5745237 13.4889802,31.5745237 C14.8206948,31.5745237 16.5390362,29.0399701 17.3122899,28.0519238 C17.8277923,27.4075458 19.1165484,25.8610385 19.1165484,25.0018678 C19.1165484,24.3574897 18.5580874,24.2286141 18.1285021,24.4004483 L18.042585,24.3145312 L28.1378409,9.02129249 C28.7392604,8.07620471 30.1139335,6.48673889 29.7273067,5.45573403 C28.6103848,2.49159507 28.8251774,1.15988046 26.1617482,0.558460964 C24.05678,0.0859170713 21.8229361,0 19.6750093,0 C14.3481509,0 8.50579006,0.601419499 3.608517,2.83526335 C0.816212178,4.08106089 0.902129249,4.9402316 0.386626821,7.73253642 C0.257751214,8.46283153 0,9.53679492 0,10.2241315 C0,11.384012 0.945087785,11.384012 1.93313411,11.384012 L4.42472917,11.3410534 Z M35.2259993,22.5102727 C33.5076578,23.7560702 31.273814,26.0328726 28.9970116,26.0328726 C27.0209189,26.0328726 26.3765409,25.0877848 26.7202092,23.3264849 C28.5244677,22.0806873 32.7773627,18.2573777 32.7773627,16.1094509 C32.7773627,15.1643631 31.6174823,14.9066119 30.8871871,14.9066119 C28.309675,14.9066119 22.9398581,20.0186776 22.9398581,25.259619 C22.9398581,27.4505043 24.0997385,30.3716847 26.6342921,30.3716847 C29.8991408,30.3716847 33.679492,26.5054165 35.6126261,24.142697 L35.2259993,22.5102727 Z M33.2069481,14.0474412 C35.0541651,14.0474412 36.6436309,11.9424729 36.6436309,10.2241315 C36.6436309,9.45087785 35.9992529,8.89241688 35.2259993,8.89241688 C33.5506164,8.89241688 31.4886066,10.4389242 31.4886066,12.2002241 C31.4886066,13.231229 32.1759432,14.0474412 33.2069481,14.0474412 L33.2069481,14.0474412 Z M43.7747479,18.9447142 C43.8177064,19.7609264 44.2472917,20.8348898 45.2353381,20.8348898 C46.3952185,20.8348898 49.7889428,17.5270826 49.7889428,15.1643631 C49.7889428,13.875607 49.1875233,13.1882705 47.8558087,13.1882705 C45.4501307,13.1882705 41.3261113,15.5080314 39.3929772,16.9686216 C36.6006724,19.0735898 35.3119163,20.4053044 35.3119163,24.0138214 C35.3119163,27.1927531 36.9013821,30.2857677 40.2091894,30.2857677 C44.2902503,30.2857677 49.1016063,26.0328726 51.722077,23.2405678 L51.2065745,21.5651849 C48.7149795,23.498319 44.9775869,26.5054165 41.7127381,26.5054165 C39.4788943,26.5054165 38.4478894,25.1737019 38.4478894,24.1856556 C38.4478894,22.9828166 39.2211431,22.3384386 40.1662309,21.651102 L43.7747479,18.9447142 Z M71.3541278,2.79230482 C71.3541278,2.19088532 70.8815839,1.71834143 70.2801644,1.67538289 C68.3899888,1.54650728 58.0799402,9.79454613 53.4404184,17.0974972 C51.9798282,19.3742996 50.2614867,21.6081434 50.2614867,24.3574897 C50.2614867,25.3884946 50.6481136,29.5554725 52.1516623,29.5554725 C52.9678745,29.5554725 53.3545013,28.9110945 53.6981696,28.2667165 C54.3425476,27.1927531 55.0298842,26.2047068 55.974972,25.345536 C57.3066866,27.4075458 59.2827792,30.6723945 62.1180426,30.6723945 C64.9962645,30.6723945 70.1512888,25.7321629 72.2992155,23.8419873 L71.8696302,22.0806873 C66.5427718,26.3335824 64.8673889,26.9350019 64.0511767,26.8920433 C62.5476279,26.8061263 62.075084,26.1187897 61.2588719,25.0018678 C64.1370938,23.2835263 69.9364961,21.092641 69.9364961,17.0974972 C69.9364961,15.8516997 69.1632424,14.0044826 67.7026522,14.0044826 C64.7814718,14.0044826 55.6742622,21.8658947 53.3545013,23.9708629 L53.4404184,22.8109824 C56.0179305,19.9757191 71.3541278,5.75644378 71.3541278,2.79230482 L71.3541278,2.79230482 Z M60.0560329,23.7560702 C59.583489,23.3264849 59.025028,23.0257751 58.4236085,22.8109824 C59.4975719,21.3503922 64.0082182,18.3432947 65.597684,18.3432947 C65.8124767,18.3432947 66.1561449,18.4292118 66.1561449,18.686963 C66.1561449,19.5890923 64.7385133,20.4912215 64.0941352,20.9637654 L60.0560329,23.7560702 Z M87.248786,21.6940605 C84.9719836,23.498319 81.3634666,26.6342921 78.3134105,26.6342921 C76.9387374,26.6342921 75.5211057,26.0758312 75.6499813,24.4434068 L75.7358984,23.498319 C83.9839372,20.7919313 86.0889055,17.6129996 86.0889055,15.5080314 C86.0889055,13.78969 84.3705641,13.4460217 82.9958909,13.4460217 C77.4112813,13.4030631 71.1822936,19.1595069 71.3541278,24.7870751 C71.4400448,27.6223384 72.900635,30.4146433 76.0366081,30.4146433 C80.2895032,30.4146433 85.0149421,26.3765409 87.6354128,23.3264849 L87.248786,21.6940605 Z M75.9936496,21.3933508 C77.1535301,18.5580874 79.6451251,16.4960777 81.7930519,15.9376167 C82.0937617,15.8516997 82.3085544,16.1094509 82.3085544,16.4101606 C82.3515129,17.1404557 79.7740007,20.1045947 75.9936496,21.3933508 L75.9936496,21.3933508 Z M99.2771759,11.5988046 C99.7067613,10.9973851 100.952559,9.57975346 100.952559,8.80649981 C100.952559,8.11916324 100.136347,7.99028764 99.5778857,7.99028764 C97.0862906,7.99028764 96.1412028,10.0093388 94.8524468,11.7706388 C90.2558835,11.9424729 89.9122152,12.6298095 87.5924542,16.4101606 L87.1199103,17.1834143 C89.3967127,16.839746 88.5805006,17.0115801 91.2009712,17.0115801 C89.6115054,19.7179679 87.248786,21.9088532 84.6712738,23.8849458 L85.1438177,25.5173702 L87.334703,23.7560702 L87.4206201,23.8419873 C86.8621591,25.0877848 86.3036982,26.7202092 86.3036982,28.1378409 C86.3036982,29.8561823 87.334703,31.0160628 89.0100859,31.0160628 C92.6615614,31.0160628 97.3010833,26.4194994 99.8356369,24.0997385 L99.6208442,22.2095629 C95.1531565,25.3884946 93.6066492,26.6772507 92.2319761,26.6772507 C91.2439298,26.6772507 90.94322,26.1187897 90.94322,25.1737019 C90.94322,22.5961898 93.3918566,19.0735898 94.8524468,17.1834143 C99.5778857,17.484124 99.921554,15.8946582 101.940605,11.8135973 L99.2771759,11.5988046 Z M106.107583,17.4411655 C106.365334,18.9017557 106.537168,20.0616362 106.666044,20.9637654 C106.537168,23.4553605 105.849832,24.1856556 103.27232,25.7751214 C102.456108,24.6581995 101.51102,23.3264849 99.921554,23.2405678 L106.107583,17.4411655 Z M111.949944,24.3145312 C109.844976,25.903997 108.169593,27.1927531 105.420247,26.7202092 C108.169593,25.0448263 111.004856,22.4243556 111.004856,18.9017557 C111.004856,17.0115801 110.360478,15.5509899 110.188644,13.9185656 C110.059768,12.7157266 109.802017,12.3290997 108.513261,12.3290997 C106.966754,12.3290997 106.150542,13.7037729 106.064625,15.1214046 L96.7426223,23.6701532 C96.3989541,24.0138214 95.7116175,24.6152409 95.7116175,25.1737019 C95.7116175,25.5603287 96.0123272,25.9899141 96.4419126,25.9899141 C96.8285394,25.9899141 97.1292492,25.6892043 97.3870004,25.4314531 C98.160254,28.5674262 101.339186,30.1998506 104.217408,30.3287262 C107.65409,30.5005603 112.336571,26.5913336 114.957041,23.9708629 L114.527456,22.3384386 L111.949944,24.3145312 Z" id="tickets-logo" sketch:type="MSShapeGroup"></path>
							</g>
						</g>
					</g>
				</svg>
				<!--функции php-->
				
		        <?php include("php/function.php");?>
				
				<form type="POST" class="search_div" name="search" action="javascript:searchJS();" >
					 <input id="otkudaS" placeholder="Откуда" class="inPunct" list="otkudaList" name="otkuda">
					 <datalist id="otkudaList">
					    <?$city_arr=getCityFrom(); ?>
						<?php foreach ($city_arr as $city): ?>
						<option id="<?echo $city->key_city;?>" value="<?echo $city->city;?>">
                        <?php endforeach;?>
					 </datalist>
					 <input id="kudaS" placeholder="Куда" class="inPunct" list="kudaList" name="kuda">
					 <datalist id="kudaList">
					    <?$city_arr=getCityTo(); ?>
						<?php foreach ($city_arr as $city): ?>
						<option id="<?echo $city->key_city;?>" value="<?echo $city->city;?>">
                        <?php endforeach;?>
					 </datalist>
					 <input placeholder="Дата" style="width:17%;" class="searchDate" name="searchDate">
					 <script>
						$(function(){
							$('.searchDate').datepicker();
									});
					 </script>
					 <input type="submit" style="width:17%;" value="Найти" class="buttonSearch">
				</form>
			 </div>
			 
			 <table class="allTable">
				<tr class="titleTr">
					 <td class="titleTable" onclick="img_sort('cityOtpravka');">
						<span class="canSort">Поезд</span>
						<div class="imgSort" id="cityOtpravka" ></div>
					 </td>
					 <td class="titleTable" style="color:#b7b7b7">
						<span class="canNotSort">№ Пути</span>
					 </td>
					 <td class="titleTable">					 
						<span class="canSort" onclick="img_sort('dt_otravki');">Отправление</span>
						<div class="imgSort" id="dt_otravki"></div>
					 </td>
					 <td class="titleTable">
						 <span class="canSort" onclick="img_sort('dt_pribit');">Прибытие</span>
						 <div class="imgSort" id="dt_pribit"></div>
					 </td>
					 <td class="titleTable" style="color:#b7b7b7">
						 <span class="canNotSort" onclick="img_sort(this);">свободные места</span>
					 </td>
					 <td></td>
				</tr>
				<?php //include_once("php/function.php");?>
				<?php  $row=infoAboutTrain();?>	
				<?php require_once("content.php");?>
				
			 </table>
		</div>
		
		<script>
		validAll();
		function validAll(){
 		 $('.inputTelephone').valid8("Вы не ввели телефон!");		 
		 $('.emailInp').valid8({
        'regularExpressions': [
							{ expression: /^.+$/, errormessage: 'Вы не ввели e-mail!'},
							{ expression: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/, errormessage: 'Запишите e-mail правильно!'}
							]
							});
		 $('.fioF').valid8("Вы не ввели фамилию!");
		 $('.fioN').valid8("Вы не ввели имя!");
		 $('.fioOt').valid8("Вы не ввели отчетство!");
		 
		 $('.grazhd').valid8("Вы не ввели гражданство!");
		 $('.seriaPas').valid8("Вы не ввели серию паспорта!");
		 $('.deistvie').valid8("Введите действие паспорта!");
		 
		$(".dataRogd").mask("99/99/9999", {placeholder: 'dd/mm/yyyy'});
		$(".deistvie").mask("99/99/9999", {placeholder: 'dd/mm/yyyy'});
		//deistvie
		$('.dataRogd').valid8("Вы не ввели ДР!");	
		$('.inputInfo input[type!="submit"]').bind({
				blur:function() {
						var t_id=$(this).attr("id");						
						if (document.getElementById(t_id+'ValidationMessage').innerHTML!='')
						   $(this).css("border","1px solid red");
						else $(this).css("border","1px solid #cccccc"); 						
						}
		});
	    }
		var icon ='<svg width="9px" height="7px" viewBox="0 0 9 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\
						<g id="home" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">\
							<g id="tickets" sketch:type="MSArtboardGroup" transform="translate(-1038.000000, -125.000000)" fill="#3679C7">\
								<g id="table" sketch:type="MSLayerGroup" transform="translate(410.000000, 121.000000)">\
									<g id="head" sketch:type="MSShapeGroup">\
										<path d="M630.089462,8.06512292 L630.674081,2.03553391 L629.714242,2.03553391 L629.035534,9.03553391 L629.995372,9.03553391 L636.035534,8.35682556 L636.035534,7.39698702 L630.089462,8.06512292 Z" id="down" transform="translate(632.535534, 5.535534) rotate(-45.000000) translate(-632.535534, -5.535534) "></path>\
										</g>\
								</g>\
							</g>\
						</g>\
					</svg>';    
        
		$('.imgSort').html(icon);
		function searchJS(){
				
				var serializeform='';
				var valueInputS = $('#otkudaS').val();
				var elemDatalist = $('#otkudaList');
                var elemDatalistOption = $(elemDatalist).find('option[value="' + valueInputS + '"]');
                var keyCityOt = elemDatalistOption.attr('id');
				serializeform=serializeform+'otkuda='+keyCityOt+'&';
			    
				valueInputS = $('#kudaS').val();
				elemDatalist = $('#kudaList');
                elemDatalistOption = $(elemDatalist).find('option[value="' + valueInputS + '"]');
				var keyCityKuda = elemDatalistOption.attr('id');
				serializeform=serializeform+'kuda='+keyCityKuda+'&';
				
				var dateSearch=$('.searchDate').val();
				serializeform=serializeform+'searchDate='+dateSearch+'&';
				
				$('body').css("opacity","0.4");
				
				$.ajax({
					type : 'POST',
					url : 'php/connector.php',
					data :serializeform+'&searchCon=Y',
					success : function(res) {
						    var strHtml="<tr class='titleTr'>"
						    strHtml=strHtml+$('.titleTr').html()+"</tr>";
						    $('.allTable').html(strHtml+res);
							$('body').css("opacity","1");
							validAll();
						}
					});
		}
		function searchAndOrderJS(orderField,isDesc){
				var serializeform='';
				var valueInputS = $('#otkudaS').val();
				var elemDatalist = $('#otkudaList');
                var elemDatalistOption = $(elemDatalist).find('option[value="' + valueInputS + '"]');
                var keyCityOt = elemDatalistOption.attr('id');
				serializeform=serializeform+'otkuda='+keyCityOt+'&';
			    
				valueInputS = $('#kudaS').val();
				elemDatalist = $('#kudaList');
                elemDatalistOption = $(elemDatalist).find('option[value="' + valueInputS + '"]');
				var keyCityKuda = elemDatalistOption.attr('id');
				serializeform=serializeform+'kuda='+keyCityKuda+'&';
				
				var dateSearch=$('.searchDate').val();
				serializeform=serializeform+'searchDate='+dateSearch+'&';
				serializeform=serializeform+'orderField='+orderField+'&';
				serializeform=serializeform+'isDesc='+isDesc+'&';
				$('body').css("opacity","0.4");
				
				$.ajax({
					type : 'POST',
					url : 'php/connector.php',
					data :serializeform+'&searchWithOrd=Y',
					success : function(res) {
						     var strHtml="<tr class='titleTr'>"
						     strHtml=strHtml+$('.titleTr').html()+"</tr>";
						     $('.allTable').html(strHtml+res);
							
							$('body').css("opacity","1");
							validAll();
						}
					});
		}
		function bronJS(id_elem,key_way){
				var serializeform = $('#'+id_elem).serialize();
				serializeform=serializeform+'&key_way='+key_way;
				
				var arr_mest_elem=$('#'+id_elem+' .selectedPlace');//
				console.log('#divMap_'+key_way+' > .divMapTr > .selectedPlace');
				console.log(arr_mest_elem.length);
				if (arr_mest_elem.length==0)
				   {$('#titleSelPlace_'+key_way).css('color','red');return 0;}
			       
				var arr_mest=[];
				
			    for (var i =0; i < arr_mest_elem.length; i++) {
							arr_mest[i]=arr_mest_elem[i].innerHTML.trim();
							serializeform=serializeform+'&arr_mesta[]='+arr_mest[i];
						}
	
				$('body').css("opacity","0.4");
				$.ajax({
					type : 'POST',
					url : 'php/connector.php',
					data :serializeform+'&Bron=Y',
					success : function(e) {
						    var res = $.parseJSON(e);
							if (res.statusSuccess)
							    {
									$('#'+id_elem+' .selectedPlace').addClass('cellMapClose');
									$('#'+id_elem+' .selectedPlace').removeClass('cellMapOpen');
									$('#'+id_elem+' .selectedPlace').removeClass('selectedPlace');
									$('#titleSelPlace_'+key_way).html("Пока вы не выбрали мест");									
									$('#allSelPlace_'+key_way).html('');
									$('#'+id_elem+' .inputInfo input[type!="submit"]').css('background-color','white');
									$('#'+id_elem+' .inputInfo input[type!="submit"]').val('');
								}
							open_bron(key_way);
							//$('#wordsForUser_'+key_way).html();
							alert(res.wordsForUser);
							console.log(res.wordsForUser);
							$('body').css("opacity","1");
						}
					});
		}
		function orderOtkuda(){
		         var isDesc='';
				 isDesc='Desc';
		}
		// $(document).ready(function(){
			
		// });
		</script>
	 </body>
</html>