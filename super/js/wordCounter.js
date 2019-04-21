$(document).ready(function(){
    max_length = 100;
$('#elect_desc').keypress(function(){
   var desc_length = $('#elect_desc').val().length;
    
var char_left = max_length - desc_length;
     $('#count').html("you have " + char_left + " left");
 
 })
    
});

