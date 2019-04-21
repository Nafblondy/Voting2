<?php  
require_once 'patch/db.inc.php';
require_once 'patch/header.php';
require_once 'patch/function.php';
?>
 <div class="container jum">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
     <div class="col-lg-8 col-md-8 col-sm-8">
<!--<h1 class="header">Web-based Election Administration Interface</h1>-->
<div class="padd">
 <fieldset class="fsborder">
  <legend class="lborder">Delete All Data</legend>
  <em>(Note: Only click this button if the positions that are being contested have changed.)</em>
<a class="reset btn btn-block btn-primary" href="/e-admin/deletevotes.php"onclick="return confirm('This action cannot be undone. Are you sure you want to proceed?');">Click here to clear out all of the old votes</a>
<a class="reset btn btn-block btn-primary" href="/e-admin/deletecandidates.php" onclick="return confirm('This action cannot be undone. Are you sure you want to proceed?');">Click here to clear out all of the old candidates.</a>
<a class="reset btn btn-block btn-primary" href="/e-admin/deletepositions.php" onclick="return confirm('This action cannot be undone. Are you sure you want to proceed?');">Click here to clear out all of the old positions.</a>
</fieldset>
</div>
<div id="ele_title" class="padd">
 <fieldset class="fsborder">
  <legend class="lborder">Set Election</legend>
<form onsubmit="return false;" id="form_title">
 <div class="form-group">
<label for="TITIE">Election Title:</label> 
<input type="text" id="elect_title" class="form-control"  placeholder="ELECTION TITLE" maxlength="40" autocomplete="on"
onfocus="emptystatus('status')"/>
 </div>
<div class="form-group">
<label for="TITIE">Election Description:</label> 
<div id="count"></div>
<textarea cols="80" rows="2" class="form-control" id="elect_desc" maxlength="100" placeholder="enter the description in 100 characters"></textarea><br/>
</div>
<input type="submit" id="stb" class="btn btn-block btn-primary" onclick="set_title()" value="SET ELECTION TITLE"/>   
</form>
<span id="title_status"></span>
 </fieldset>
</div>
<div class="padd">
  <fieldset class="fsborder">
  <legend class="lborder">Add Position</legend>
<p id="load"></p>
<form onsubmit="return false">
 <div class="form-group">
Name of Position: 
<input name="positionname" type="text" class="form-control" id="positionname" size="40" onclick='javascript: this.value = ""' autocomplete="off" /> 
 </div>
<div class="form-group">
Rank: 
<input name="rank" type="text" class="form-control" id="rank" value="0" size="3" maxlength="3" onclick='javascript: this.value = ""' autocomplete="off"/><br/>
</div>
<input type="submit" id="pos_stb" class="btn btn-block btn-primary" value="Create Position"/><span id="pos_status"></span>
</form>
  </fieldset>
</div>
<div class="padd">
  <fieldset class="fsborder">
  <legend class="lborder">Add Candidate</legend>
<form onsubmit=" return false;">
<div class="form-group">
Last Name:
<input name="lastname" type="text" class="form-control" id="lname" size="40" onfocus="fetch_position()" />
</div>
<div class="form-group">
First Name: 
<td><input name="firstname" class="form-control" type="text" id="fname" size="40" />
</div>   
<div class="form-group">
Role:
<select  id="dropPos" class="form-control">
</select>
</div>
<input type="submit" onclick="candidateDetails()" class="btn btn-block btn-primary" value="Add Candidate"  id="cand_stb"/>
<span id="candi_status"></span>
</form>
</fieldset>
  </div>
<div class="padd">
  <fieldset class="fsborder">
  <legend class="lborder">Upload candidate's image</legend>
  <form action="processor/cand_image_upload.php" method="post" enctype="multipart/form-data"  >
 <div class="form-group">
upload candidates image
<select class="form-control" id = "fetch_users" name = "cand_name">
<?php // the candidate name ?>
</select>
 </div>
Image:<input type="file" name="uploaded_file" id="" class="form-control" /><br/>

<input type="submit" name="imgupload" value="Upload cadidate photo" class="btn btn-block btn-primary"/>
</form>
</fieldset>
    
</div>
<div class="padd">
  <fieldset class="fsborder">
  <legend class="lborder">Set Election Time</legend>
<div id="set">
    
<span id="date_status"></span>
<form onsubmit=" return false">
    <p id="basicExample">
     Starting Time
	 <input type="text" class="date start form-control" id="date_start" placeholder="date eg 12/8/2015" />
	Starting Time
   <input type="text" class="time start form-control" id="time_start"  placeholder=" starting time eg:9am"/>
    Ending Date
       <input type="text" class="date end form-control" id = "date_end" placeholder="date eg 12/8/2015"/>
	   Ending Time
    <input type="text" class="time end form-control" id = "time_end" placeholder=" starting time eg:9pm"/>

  <br>
    <input type=submit onclick="display()" value="Set election date" id="date_stb" class="btn btn-block btn-primary"/>
	 
  </p>
</form>
</div>
</fieldset>
</div>
     <div class="padd">
  <fieldset class="fsborder">
  <legend class="lborder"> Upload a new roll of eligible voters.</legend>
<form action="processor/image_upload.php" method="post" enctype="multipart/form-data" name="dataupload" id="dataupload">
<div class="form-group">
 <i>Note: This file must be .txt format, and have one student id per line with no other data in the file</i>
</div>
<div class="form-group">
 Upload a new roll of eligible voters.
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
<input type="file" name="newfile" class="form-control" />
</div>
<input type="submit" name="submit" value="Upload" class="btn btn-block btn-primary" />
</form>
</fieldset>
     </div>
<div id="secure" class="padd">
   <fieldset class="fsborder">
  <legend class="lborder">Set vote display</legend>
<form id="security" onsubmit=" return false;">
 <div class="form-group">
<b>SHOW VOTING RESULT AS YOU VOTE:</b>  <select id="real_time" class="form-control">
<option value="">SELECT AN OPTION</option>
<option value="yes">YES</option>
<option value="no">NO</option>
</select>
</div>
<p><input type="submit" onclick="realTime()" class="btn btn-block btn-primary" value="Save" id="real_btn" />
</p>
</form>
<span id="real_status"></span>
   </fieldset>
</div>
</div>
</div>
 <div class="col-lg-2 col-md-2 col-sm-2"></div>
 </div>
</body>
  <script>
               
            _("pos_stb").addEventListener("click", setPosition);
    </script>
    <script>
    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
	
	
</script>
</html>
<?php require_once("patch/footer.php");?>
