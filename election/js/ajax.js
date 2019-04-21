function AjaxObject( meth, url){
         var x = new XMLHttpRequest();
         x.open( meth, url, true);
         x.setRequestHeader("content-type","application/x-www-form-urlencoded");
              return x;
        }
    
     function ajaxReturn(x){
     if(x.readyState == 4 && x.status == 200){
                return true;
            }
         
       }
        
function _(x){
   return document.getElementById(x);
     }//end tag handler
     
     function emptystatus(x){
    _(x).innerHTML=" ";
    
}//empty status 
function showcandidate(tbl){
var a = tbl.split("_");
document.getElementById("returnData").innerHTML = '<img src="images/loader.gif"  />';
var hr = new XMLHttpRequest();
var page = "ajax.php";
hr.open("POST", page, true);
hr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function(){
if(hr.readyState == 4 && hr.status == 200){
var return_data = hr.responseText;
document.getElementById("returnData").innerHTML = return_data;
}
}
hr.send("getcandidate="+a[1]);
}