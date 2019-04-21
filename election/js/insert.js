
function _(x){
   return document.getElementById(x);
     }
 function ajaxReturn(x){
     if(x.readyState == 4 && x.status == 200){
                return true;
            }
         
       }
function AjaxObject( meth, url){
         var x = new XMLHttpRequest();
         x.open( meth, url, true);
         x.setRequestHeader("content-type","application/x-www-form-urlencoded");
              return x;
        }
function insertVote() {
	 $('.error').hide();
	  var radioList = $('input:radio');
	  var p = "";
          var posId =  _("posId").value;
          var userId=  _("userId").value;
          var status =  _("status");
          var btn =  _("btn");
	  var radioNameList = new Array();
	  var radioUniqueNameList = new Array();
	  var notCompleted = 0;
	  for(var i=0; i< radioList.length; i++){
		  radioNameList.push(radioList[i].name);
	  }
	  radioUniqueNameList = jQuery.unique( radioNameList );
	  for(var i=0; i< radioUniqueNameList.length; i++){
		  if(typeof($('input:radio[name='+radioUniqueNameList[i]+']:checked').val()) === "undefined"){
          $('input:radio[name='+radioUniqueNameList[i]+']').parent().find('.error').show();
          notCompleted++;
		  }
else if(typeof($('input:radio[name='+radioUniqueNameList[i]+']:checked').val()) != "undefined"){
         p = $('input:radio[name='+radioUniqueNameList[i]+']:checked').val();
                     break;
 }
	}
	 if(notCompleted > 1){
     alert('please cast your vote');
		 //return false;
	 }else{
    
             btn.style.display = "none";
   status.innerHTML = "<img src='images/loader.gif' alt='loading.......' >";
       var ajax = AjaxObject("POST", "processing/insert_voted.php");
      ajax.onreadystatechange = function() {
	       if(ajaxReturn(ajax) == true) {
	           if(ajax.responseText != "success"){
			status.innerHTML = ajax.responseText;
			btn.style.display = "block";
                        
			} else {
				 btn.style.display = "block";

                    status.innerHTML = "Thank you for voting";	
                    
                                
            }
	       }
        }
               ajax.send("posId="+posId+"&p="+p+"&userId="+userId);
   
    
}

      
		 //return true;
	 
}


   
