function matrix_all_data(){
	if (exist_data("a_matrix"))
	{
		if (!exist_data("b_matrix"))
		{
			document.getElementById('controls').style.backgroundColor = '#f6c1c0';
			document.getElementById('bag_caption').innerHTML='Не все матрицы заполнены!';
			return false;
		}
        
    }else {
		document.getElementById('controls').style.backgroundColor = '#f6c1c0';
		document.getElementById('bag_caption').innerHTML='Не все матрицы заполнены!';
		return false;
	}
	return true;
} 
function exist_data(id_table){

var Input_all = $('#'+id_table+' tr td input');
	for (var i=0;i<Input_all.length;i++)
         {
		var id_elem=Input_all[i].id;
		  if ($("#"+id_elem).val()=="")
		     {
				 return false;
			 }
		
		}
return true;		
}
function col_and_rows(){
	var id_matrix1Div="left_matrix";
	var id_matrix2Div="down_matrix";
	
	var matrix1=$('#'+id_matrix1Div+' tr');
	var obozn1=$('#'+id_matrix1Div+' p').text().toLowerCase();
	var matrix1_countCol=$('#'+obozn1+'0 td').length;
	
	var matrix2_countRow=$('#'+id_matrix2Div+' tr').length;
	var obozn2=$('#'+id_matrix2Div+' p').text().toLowerCase();
	
	if (matrix1_countCol==matrix2_countRow)
	    {
			return true;
		} else {
		        document.getElementById('controls').style.backgroundColor = '#f6c1c0';
		        document.getElementById('bag_caption').innerHTML="Такие матрицы нельзя перемножить, так как количество столбцов матрицы "+obozn1.toUpperCase()+
				                                                  " не равно количеству строк матрицы "+obozn2.toUpperCase()+"!";
		       return false;	
		}
	
	
}
function FindError(id_elem){
	
var col_input=document.getElementById(id_elem);
var str_edit=$("#"+id_elem).val();
	
var num_edit=parseInt(str_edit);
	if (str_edit!='')
	   {
		   if (isNaN(num_edit))
		   {
		    document.getElementById('controls').style.backgroundColor = '#f6c1c0';
		    document.getElementById('bag_caption').innerHTML='Вы ввели не число!';	
			return true;
	       } else {
		           if (parseInt(str_edit)>10)
			          {
				       document.getElementById('controls').style.backgroundColor = '#f6c1c0';
		               document.getElementById('bag_caption').innerHTML='Максимально допустимое число 10!';
			           return true;
					  }
		             else {
						  
						  return false;
						  }
	              }
	    }
        else {
			//document.getElementById('controls').style.backgroundColor = '#bcbcbc';
			return false;
			}
}
function valid_all_table(){
	var id_tableA='a_matrix';
	var id_tableB='b_matrix';
	
	document.getElementById('bag_caption').innerHTML='';
	var colvo_error=0;
	var Input_all = $('#'+id_tableA+' tr td input');
	for (var i=0;i<Input_all.length;i++)
         if (FindError(Input_all[i].id))
		 {
			colvo_error++;
			document.getElementById(Input_all[i].id).style.backgroundColor='red';
	     }
		 
	Input_all = $('#'+id_tableB+' tr td input');
	for (var i=0;i<Input_all.length;i++)
         if (FindError(Input_all[i].id))
		 {
			colvo_error++;
			document.getElementById(Input_all[i].id).style.backgroundColor='red';
	     }	else { 
		         document.getElementById(Input_all[i].id).style.backgroundColor='white';
				 
		         } 
		 
	 if (colvo_error==0)
	    {
			document.getElementById('controls').style.backgroundColor = '#5199db';
			return true;
		}		else {
			          return false;
		              }
	
}
function clear_all_table(){
	
	
	document.getElementById('bag_caption').innerHTML='';
	
	var id_tableA='a_matrix';
	clear_one_matrix(id_tableA);
	var id_tableB='b_matrix';
	clear_one_matrix(id_tableB);
	var id_res='res_matrix';
	clear_one_matrix(id_res);
	
	document.getElementById('controls').style.backgroundColor = '#bcbcbc';
}
function clear_one_matrix(id_table){
	
	var Input_all = $('#'+id_table+' tr td input');
	for (var i=0;i<Input_all.length;i++)
         {
		var id_elem=Input_all[i].id;
		$("#"+id_elem).val('');
		if (id_table!="res_matrix") 
		   endEditing_this(id_elem);
		}
}
function replace_matrix(){
	var matrix1=document.getElementById('down_matrix').innerHTML;
	var matrix2=document.getElementById('left_matrix').innerHTML;
	document.getElementById('down_matrix').innerHTML=matrix2;
	document.getElementById('left_matrix').innerHTML=matrix1;
	new_res();

}
function new_res(){
	var obozn1=$('#down_matrix p').text().toLowerCase();
	var matrix1_colCount=$('#'+obozn1+'0 td').length;
	
	var matrix2_rowCount=$('#left_matrix table tr').length;
	create_matrix('res_matrix', matrix2_rowCount, matrix1_colCount, 'c','read_only');
}
function endEditing_this(id_elem){
         if ((! FindError(id_elem)) || ($("#"+id_elem).val()==''))
		 	document.getElementById(id_elem).style.backgroundColor='white';
		 if ( document.getElementById('controls').style.backgroundColor== '#5199db'
		 || document.getElementById('controls').style.backgroundColor=='rgb(81, 153, 219)')	
              document.getElementById('controls').style.backgroundColor = '#bcbcbc';
			
}
function add_row(id_table,obozn){
	
	var table=document.getElementById(id_table);
	var row_all = $('#'+id_table+' tr');
	var count_row=row_all.length;
	if (count_row==10)
	{
		//document.getElementById('bag_caption').innerHTML='';
		return 1;
	}
	var col_all=$('#'+obozn+(row_all.length-1)+' td');
	var count_col=col_all.length;
	
	var new_row= document.createElement('tr');
	    new_row.className = 'matrix_rows';
        new_row.id = obozn+count_row;
     for(var j = 0; j < count_col; j++)
	    {
		   var new_col=document.createElement('td');
	       new_col.className = 'matrix_cols';
           new_col.id = obozn+count_row+"_"+j+"_c";
           
           var new_col_input=document.createElement('input');
	       new_col_input.className = 'matrix_colsInput';
		   new_col_input.id=obozn+count_row+"_"+j;
		   new_col_input.placeholder=obozn+(count_row+1)+","+(j+1);
		   new_col.appendChild(new_col_input);
		   new_col_input.onclick='edit_Matrix(id_elem)';
		   new_row.appendChild(new_col);
	    }
     table.appendChild(new_row);
     new_res();	
add_all_Event(id_table, obozn);	 
}
function delete_row(id_table,obozn){
	
	var table=document.getElementById(id_table);
	var row_all = $('#'+id_table+' tr');
	var count_row=row_all.length;
	if (count_row==2)
	{
		//document.getElementById('bag_caption').innerHTML='';
		return 1;
	}
	
	var last_row= row_all[count_row-1];
	last_row.parentNode.removeChild(last_row);
	new_res();
}
function add_col(id_table,obozn){
	
	var table=document.getElementById(id_table);
	var row_all = $('#'+id_table+' tr');
	var count_row=row_all.length;
	
	var col_all=$('#'+obozn+(row_all.length-1)+' td');
	var count_col=col_all.length;
	if (count_col==10)
	{
		return 1;
	}
	for(var i = 0; i < count_row; i++)
	    {
	    var row=document.getElementById(obozn+i)
	    var new_col=document.createElement('td');
	        new_col.className = 'matrix_cols';
            new_col.id = obozn+i+"_"+count_col+"_c";
           
        var new_col_input=document.createElement('input');
	        new_col_input.className = 'matrix_colsInput';
		    new_col_input.id=obozn+i+"_"+count_col;
		    new_col_input.placeholder=obozn+(i+1)+","+(count_col+1);
		    
			new_col.appendChild(new_col_input);
		    new_col_input.onclick='edit_Matrix(id_elem)';
			
		    row.appendChild(new_col);
	       
		}
     new_res();
add_all_Event(id_table, obozn);	 
}
function delete_col(id_table,obozn){
	
	var table=document.getElementById(id_table);
	var row_all = $('#'+id_table+' tr');
	var count_row=row_all.length;
	
	var col_all=$('#'+obozn+(row_all.length-1)+' td');
	var count_col=col_all.length;
	if (count_col==2)
	{
		return 1;
	}
	for(var i = 0; i < count_row; i++)
	    {
	    var row=document.getElementById(obozn+i)
	    var col=document.getElementById(obozn+i+"_"+(count_col-1)+"_c");
		col.parentNode.removeChild(col);
	    }
     new_res();	 
}
function delete_row(id_table,obozn){
	
	var table=document.getElementById(id_table);
	var row_all = $('#'+id_table+' tr');
	var count_row=row_all.length;
	if (count_row==2)
	{
		return 1;
	}
	
	var last_row= row_all[count_row-1];
	last_row.parentNode.removeChild(last_row);
	new_res();
}
function create_matrix(id_table, count_rows, count_cols, obozn,read_only){
//создание массива
var oboznUp=obozn.toUpperCase()
var matrix = new Array(count_rows);
for(var i = 0; i < matrix.length; i++)
	matrix[i] = new Array(count_cols);
//создание разметки
var table = document.getElementById(id_table);
var elem = document.getElementById(id_table);
table.innerHTML='';
for(var i = 0; i < matrix.length; i++)
   {
	 var new_row= document.createElement('tr');
	 new_row.className = 'matrix_rows';
     new_row.id = obozn+i;
     for(var j = 0; j < matrix[i].length; j++)
	   {
		   var new_col=document.createElement('td');
	       new_col.className = 'matrix_cols';
           new_col.id = obozn+i+"_"+j+"_c";
           
           var new_col_input=document.createElement('input');
	       new_col_input.className = 'matrix_colsInput';
		   new_col_input.id=obozn+i+"_"+j;
		   
		   new_col_input.placeholder=obozn+(i+1)+","+(j+1);
		   new_col.appendChild(new_col_input);
		   
		   new_col_input.onclick='edit_Matrix(id_elem)';
		   if (read_only=='read_only')
		   { 
			 new_col_input.setAttribute("disabled",true);
		   }
	       new_row.appendChild(new_col);
	   }
     table.appendChild(new_row);
   } 
   
 add_all_Event(id_table, obozn);
    
}
function add_all_Event(id_table, obozn){
	
    var matrix = $('#'+id_table+' tr');
	var col_all=$('#'+obozn+(matrix.length-1)+' td');
	
    var id_elem="";
	  for(var i = 0; i < matrix.length; i++)
       for(var j = 0; j < col_all.length; j++)
	     {
		   var id_elem=obozn+i+"_"+j;
		   document.getElementById(id_elem).removeAttribute('onkeyup');
		   document.getElementById(id_elem).setAttribute('onkeyup', "valid_all_table();");
		   document.getElementById(id_elem).removeAttribute('onBlur');
		   document.getElementById(id_elem).setAttribute('onBlur',"endEditing_this('"+id_elem+"');");
		   document.getElementById(id_elem).removeAttribute('type');
		   document.getElementById(id_elem).setAttribute('type', 'text');
		   document.getElementById(id_elem).removeAttribute('pattern');
		   document.getElementById(id_elem).setAttribute('pattern','[0-9]{2}');
		   
		 }
}
function multy_matrix(){
	valid_all_table();
	if (document.getElementById('controls').style.backgroundColor == '#f6c1c0' || document.getElementById('controls').style.backgroundColor =='rgb(246, 193, 192)')
	{ return 0;}
	clear_one_matrix("res_matrix");
	
	//res=matrix2*matrix1
	var id_matrix1Div="left_matrix";
	var id_matrix2Div="down_matrix";
	var id_res="res_matrix";
	
	if (col_and_rows())
	         {
			  if (! matrix_all_data())
	             return 0;
			 }
	    else { return 0;}
	
	
	var matrix1=$('#'+id_matrix1Div+' tr');
	var obozn1=$('#'+id_matrix1Div+' p').text().toLowerCase();
	
	var matrix2=$('#'+id_matrix2Div+' tr');
	var obozn2=$('#'+id_matrix2Div+' p').text().toLowerCase();
	var matrix2_countCol=$('#'+obozn2+'0 td').length;
	
	var res=$('#'+id_res+' tr');
	var res_col=0;
	var val1=0;
	var val2=0;
	for(var i = 0; i < matrix1.length; i++)
	    { 
	     res_col=0;
		 var matrix1_coll=$('#'+obozn1+i+' td');
         for(var j = 0; j < matrix1_coll.length; j++)
	        {
			 val1=$("#"+obozn1+i+"_"+j).val();
			 for (var jj=0; jj<matrix2_countCol; jj++)
			 {
				 //res_col=0;
		    // for(var ii = 0; ii < matrix2.length; ii++)
	            //{ 
	             //var matrix2_coll=$('#'+obozn2+j+' td');
			     val2=$("#"+obozn2+j+"_"+jj).val();
				 var val3=$("#c"+i+"_"+jj).val();
			     if (val3==undefined || val3=="NaN" || val3=="")
			        {val3=0;}
			     res_col=parseInt(val3)+parseInt(val1)*parseInt(val2);
			     
                //}
			 //res_col=res_col+val1+val2;
			 $("#c"+i+"_"+jj).val(res_col);
			 }
		    }			
        }
}