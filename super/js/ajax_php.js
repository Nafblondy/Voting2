function showresult(tbl){
var a = tbl.split("_");
document.getElementById("returnData").innerHTML = '<img src="images/loader.gif"  />';
var hr = new XMLHttpRequest();
var page = "processing/ajax_php.php";
hr.open("POST", page, true);
hr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function(){
if(hr.readyState == 4 && hr.status == 200){
var return_data = hr.responseText;
document.getElementById("returnData").innerHTML = return_data;
}
}
hr.send("showresults="+a[1]);
}


