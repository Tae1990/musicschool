<?php
		include "../modules/session.php";
		include "../modules/database.php";
		include "../modules/sanitize.php";

		include "headerIndex.php";

		//include "headerPage.php";
//		include "contactBody.php";
		//include "footer.php";
		
		/* 클래스 파일 로드 */



 //$mailto="받는주소";
/*
 $mailto="master@ifb29963musicschool.com";
 $subject="mail test";
 $content="test";
 $result=mail($mailto, $subject, $content);
 if($result){
  echo "mail success";
  }else  {
  echo "mail fail";
 }
*/
?>
<link rel="stylesheet" href="../css/style.css">
<!-- i need to put this into style.css -->
<!-- 여기서 body 백그라운드 패딩 마진으로 br을 대체해주는데, 문제는 이걸 css에 넣으면 main body와 lesson body가 겹친다 -->

<style> 
	body{
	 
	  margin: 40px;
	  padding: 30px;
   }
	  
 
</style>

<body>


<div class="contact"> 

<form name="contactform" method="post" action="send_form_email.php">
 
<table width="450px">

<tr>
 
 <td valign="top">
 
  <label for="first_name">First Name *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="first_name" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top"">
 
  <label for="last_name">Last Name *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="last_name" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="email">Your email Address *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="email" maxlength="80" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="telephone">Telephone Number</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="telephone" maxlength="30" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="comments">Comments *</label>
 
 </td>
 
 <td valign="top">
 
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 
 </td>
 
</tr>
 
<tr>
 
 <td colspan="2" style="text-align:center">
 
  <input type="submit" value="Submit">  
 
 </td>
 
</tr>
 
</table>
 
</form>


  </div><!--contact-->
  <div class="aside">
    <dl>
      <dt>Contact Email</dt>
      <dd>master@ifb29963musicschool.com</dd>
      <dt>Telephone</dt>
      <dd>07-3333-3333</dd>
      <dt>Address</dt>
      <dd>
        <address>
          Music School Ltd.<br />
          Gardens Point<br />
          Brisbane<br />
          QLD 4000<br />
          Australia<br /><br />
          Company No.<br />
		  07-3333-3333
        </address>
      </dd>
    </dl>
  </div><!--aside-->
</body>






