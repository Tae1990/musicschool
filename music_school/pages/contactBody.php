<?php 
 if (!isset($_SESSION['login']) and !isset($_SESSION['error']))
 {       
	echo(
          "<div class=\"login\">
           <form action=\"../modules/login.php\" method=\"post\">
           <div class=\"form-group\">
           <label for=\"userName\">User name</label>
           <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
           </div>
           <div class=\"form-group\">
           <label for=\"password\">Password</label>
           <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
           </div>
           <button type=\"submit\"> Login</button>
           </form>
           <form action=\"register_student.php\">
           <input type=\"submit\" value=\"Register as student\">
           </form>
		   <form action=\"register_teacher.php\">
           <input type=\"submit\" value=\"Register as teacher\">
           </form>
		   
		  
		  </div><!--login-->");
 }
 elseif ( isset($_SESSION['error']) )
 {
	
	 echo("<div class=\"login\">
           <form action=\"../modules/login.php\" method=\"post\">
           <div class=\"form-group\">
           <label for=\"userName\">User name</label>
           <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
            </div>
            <div class=\"form-group\">
              <label for=\"password\">Password</label>
              <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
            </div>
              <button type=\"submit\"> Login</button>
              </form>
              <form action=\"register_student.php\">
           <input type=\"submit\" value=\"Register as student\">
           </form>
		   <form action=\"register_teacher.php\">
           <input type=\"submit\" value=\"Register as teacher\">
           </form>
			  ".$_SESSION['error']."
			</div><!--login-->");	
	unset($_SESSION['error']);		  
 }
else
{
	echo ("<div class=\"login\">
		         <form action=\"../modules/logout.php\" method=\"post\">". $_SESSION['userName'] . "
				 <br>
				 <button type=\"submit\"> Log out</button>
				 </form>
		         </div><!--login-->"); 
           }
		  ?>
<div class="contact"> 
 <form id="contact-form" class="styled-form" action="ThankYouPage.php" method="post" accept-charset="utf-8">
    <div style="display:none"><input type="hidden" name="csrfmiddlewaretoken" value="8ece95d139633656ad0371bf53c45b2d" /></div>    
    <h1 class="pagetitle">Contact us</h1>
    
    <div class="note">
      <p>We are here to answer any questions you may have about Music School
        experiences. Reach out to us and we'll respond as soon as we can.</p>
    </div>
    
    <p class="row half first">
      <label for="id_name">Name: <span class="required">*</span></label>
      <span class="field"><input type="text" name="name" id="id_name" required/></span>
    </p>
    <p class="row half">
      <label for="id_email">Email: <span class="required">*</span></label>
      <span class="field"><input type="email" name="email" id="id_email" required/></span>
    </p>
    <p class="row">
      <label for="id_message">Message: <span class="required">*</span></label>
      <span class="field"><br/><textarea cols="40" rows="5" name="message" id="id_message" required></textarea></span>
    </p>
    <p class="submit-row">
      <button type="submit">SEND</button>
    </p>
  </form>
  </div><!--contact-->
  <div class="aside">
    <dl>
      <dt>Email</dt>
      <dd>info@MusicSchool.com</dd>
      <dt>Telephone</dt>
      <dd>07-3333-3333</dd>
      <dt>Address</dt>
      <dd>
        <address>
          Music School Ltd.<br />
          1 Kings Avenue<br />
          Brisbane<br />
          QLD 4000<br />
          Australia<br /><br />
          Company No.<br />
		  07-3333-3333
        </address>
      </dd>
    </dl>
  </div><!--aside-->