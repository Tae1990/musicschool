<?php
include "../pages/headerIndex.php";
?>
<link rel="stylesheet" href="../css/style.css">

<html>
<style>

.bg-grey {
  background-color: #f6f6f6;
}
.logo {
  font-size: 200px;
}
@media screen and (max-width: 768px) {
  .col-sm-4 {
    text-align: center;
    margin: 25px 0;
  }
}
</style>
</body>

<br><br><br><br><br>
<!-- Container (About Section) -->

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-8"> 
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9">
            
              <div class="thumbnail">
                <img src="images.jpg" width="500" height="300" alt="student">
				
              </div>
           
          </div>

          
        </div>
      </div>
	   <h2>Personal Profile</h2>
    </div>
    
    
    <!--  <form action="action_page.php" method="post">
    <div>
    <label for="dob">Date of Birth:</label>
    <br>
    <input type="date" id="Birth" name="user_birth" />
  </div>
  
  <div>
  <label for="home">Home Address:</label>
  <br>
  <input type="text" name="firstname" value="Mickey">
</div>

<div>
<label for="mail">E-mail:</label>
<br>
<input type="email" id="mail" name="user_email" />
</div>

<div>
<label for="mail">facebook:</label>
<br>
<input type="email" id="facebook" name="user_email" />
</div>


<div>
<label for="mail">Name of Mother:</label>
<br>
<input type="email" id="facebook" name="user_email" />
</div>


<div>
<label for="mail">facebook:</label>
<br>
<input type="email" id="facebook" name="user_email" />
</div>


<div>
<label for="mail">facebook:</label>
<br>
<input type="email" id="facebook" name="user_email" />
</div>


</form>
-->


<form name="htmlform" method="post" action="html_form_send.php">
  <table width="450px">
  </tr>
 

  <tr>
    <td valign="top">
      <label for="first_name"><h4><strong>Name:</strong></label>
      </td>
      <td valign="top">
        <input  type="text" name="first_name" maxlength="50" size="30">
      </td>
    </tr>	  
    
    <tr>
      <td valign="top">
        <label for="student_id"><h4><strong>Student ID:</strong></label>
        </td>
        <td valign="top">
          <input  type="text" name="student_id" maxlength="50" size="30">
        </td>
      </tr>	  
 
      
      <tr>
        <td valign="top">
          <label for="dob">Date of Birth:</label>
        </td>
        <td valign="top">
          <input type="date" name="Birth" maxlength="50" size="30" />
        </td>
      </tr>
      
      
      <tr>
        <td valign="top"">
          <label for="home_address">Home Address:</label>
        </td>
        <td valign="top">
          <input  type="text" name="home_address" maxlength="50" size="30">
        </td>
      </tr>
      
      <tr>
        <td valign="top">
          <label for="telephone">Telephone Number:</label>
        </td>
        <td valign="top">
          <input  type="text" name="telephone" maxlength="30" size="30">
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="email">Email Address:</label>
        </td>
        <td valign="top">
          <input  type="text" name="email" maxlength="80" size="30">
        </td>
      </tr>
      
      <tr>
        <td valign="top">
          <label for="facebook">Facebook:</label>
        </td>
        <td valign="top">
          <input  type="text" name="facebook" maxlength="80" size="30">
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="name_of_mother">Name of Mother:</label>
        </td>
        <td valign="top">
          <input  type="text" name="name_of_mother" maxlength="80" size="30">
        </td>
      </tr>
      
   
      <tr>
        <td valign="top">
          <label for="name_of_father">Name of father:</label>
        </td>
        <td valign="top">
          <input  type="text" name="name_of_father" maxlength="80" size="30">
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="home_phone">Home phone:</label>
        </td>
        <td valign="top">
          <input  type="text" name="home_phone" maxlength="30" size="30">
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="parent_email">Parent's email:</label>
        </td>
        <td valign="top">
          <input  type="text" name="parent_email" maxlength="30" size="30">
        </td>
      </tr>
      
      

    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
        <input type="submit" value="edit"> 
      </td>
    </tr>
  </table>
</form>



<!--
  <tr>
    <td valign="top">
      <label for="comments">Comments *</label>
    </td>
    <td valign="top">
      <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
    </td>
  -->
  
  

</div>

</div>



</body>
</html>