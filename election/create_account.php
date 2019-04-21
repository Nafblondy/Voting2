<?php include 'patch/header_signup.php'; ?>


<div class="jumbotron jum"><!--jumbotron beginning-->
<div class="container"><!--container bengin-->
<div class="row"><!--rows begin-->

<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of second col-->
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<img src="images/political.gif" width="100" height="100" />
</div><!--end of inner second col-->
</div><!--end of inner second col-->
<br>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<img src="images/checklist4.gif" width="100" height="100" />
</div><!--end of inner second col-->
</div><!--end of inner second col-->
<br>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<img src="images/verified10.gif" width="100" height="100" />
</div><!--end of inner second col-->
</div><!--end of inner second col-->
</div><!--end of the second col-->
<div class="col-lg-4 col-md-4 col-sm-4 form-container margin"><!--beginning of third col-->
<div class="form-header">
    <i class="fa fa-user"></i>
    </div>
<p>
        <form action="" onsubmit="return false;" id="signupform">
      
        <div class="form-group">
        
   <b>Matric No:</b><br>
<div class="input-group">
           <input type="Matric" class="form-control" placeholder="Matric" id="matric" onblur="check()" onfocus="emptystatus('status')">  
  <span class="input-group-addon" id="matric_status"></span>
</div>
<b>Email:</b><br>
<div class="input-group">
       <input type="email" class="form-control"  placeholder="email" id="email" onfocus="emptystatus('status')">
  <span class="input-group-addon"></span>
</div>
        </div>
            <div class="form-group"><!--beginning of form group-->
<b>Phone Number:</b><br>
<div class="input-group">
           <input type="tel" class="form-control"  placeholder="phone number" id="phone_no" onfocus="emptystatus('status')">
      <span class="input-group-addon"></span>
</div>
 </div>
 <div class="form-group"><!--beginning of form group-->
<b>Gender:</b><br>
<select id="gender" class="form-control">
<option value="">Select Gender</option>
 <option value="Male">Male</option>
<option value="Female">Female</option>
</select>
 </div>
<div class="form-group"><!--beginning of form group-->
<b>Password:</b><br>
 <div class="input-group">
           <input type="password" class="form-control"  placeholder="password" id="pass" onfocus="emptystatus('status')">
    <span class="input-group-addon"></span>   
 </div>
</div>
<div class="form-group"><!--beginning of form group-->
<b>Confirm Password:</b><br>
<div class="input-group">
           <input type="password" class="form-control" placeholder="password" id="Vpass" onfocus="emptystatus('status')">
    <span class="input-group-addon"></span>    
</div>
</div>  
 <input type="submit" class="btn btn-block btn-primary" id="subtn" onclick="signup()" value="Create an account" />
 <div id="status"></div>
        </form>
</p>
        </div>
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of second col-->
</div>
        </div>
        </div>
        </div>
      
   
  <?php include 'patch/footer.php'; ?>
    </body>
</html>
