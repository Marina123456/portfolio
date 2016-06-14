function open_bron(numTrain){
	 if (document.getElementById("buttBuy_"+numTrain).style.display!="none"){
	 
	    document.getElementById("buttBuy_"+numTrain).style.display="none";
	    var formBron=document.getElementById("bron_"+numTrain);
	    $("#bron_"+numTrain).show("slow");
	    formBron.style.backgroundColor="#fff3fb";
		var trainTr=document.getElementById("train_"+numTrain);
	    trainTr.style.backgroundColor="#fff3fb";
	    $("#train_"+numTrain).css("border-bottom","none");
	} else {
		 document.getElementById("buttBuy_"+numTrain).style.display="block";
	    var formBron=document.getElementById("bron_"+numTrain);
	    $("#bron_"+numTrain).hide("fast");
	    var trainTr=document.getElementById("train_"+numTrain);
	    trainTr.style.backgroundColor="white";
	    $("#train_"+numTrain).css("border-bottom","1px solid #d8d8d8");
	}
	
}
function vibor_mest(elem_mesto,numTrain){
	var titleSelPlace=document.getElementById("titleSelPlace_"+numTrain);
	var allSelPlace=document.getElementById("allSelPlace_"+numTrain);
	if ($(elem_mesto).hasClass('selectedPlace'))
	    $(elem_mesto).removeClass('selectedPlace');
	else {
		  if (!$(elem_mesto).hasClass('cellMapClose'))
			   $(elem_mesto).addClass('selectedPlace');
		}
	if ($('#divMap_'+numTrain+' .selectedPlace').length==0)
		{
		titleSelPlace.innerHTML="Пока вы не выбрали мест";
		allSelPlace.innerHTML="";
		}
	else {
		  $('#titleSelPlace_'+numTrain).css('color','black');
		  titleSelPlace.innerHTML="Вы выбрали";	     
		  var allTextPlace = $('#divMap_'+numTrain+' .selectedPlace').map(function(el){ 
							  return this.innerHTML;
						      }).get().join(", ");
		allSelPlace.innerHTML=allTextPlace+" места";
		}	 
}
function img_sort(elem_id){
	var down ='<svg width="9px" height="7px" viewBox="0 0 9 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\
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
    var up='<svg width="9px" height="7px" viewBox="0 0 9 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\
               <g id="home" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">\
					<g id="tickets" sketch:type="MSArtboardGroup" transform="translate(-464.000000, -124.000000)" fill="#3679C7">\
						<g id="table" sketch:type="MSLayerGroup" transform="translate(410.000000, 121.000000)">\
							<g id="head" sketch:type="MSShapeGroup">\
								<path d="M56.0894619,11.0651229 L56.6740808,5.03553391 L55.7142422,5.03553391 L55.0355339,12.0355339 L55.9953724,12.0355339 L62.0355339,11.3568256 L62.0355339,10.396987 L56.0894619,11.0651229 Z" id="up" transform="translate(58.535534, 8.535534) scale(-1, -1) rotate(-45.000000) translate(-58.535534, -8.535534) "></path>\
							</g>\
						</g>\
					</g>\
				</g>\
			</svg>';
	var textElem=$('#'+elem_id).html();
	if (textElem==down){	
		 $('#'+elem_id).html(up);
		 searchAndOrderJS(elem_id,'Desc');
	}
	else {
		$('#'+elem_id).html(down);
		searchAndOrderJS(elem_id,'');
	}
	
}