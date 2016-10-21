<?php
		include "../modules/session.php";
		include "../modules/database.php";
		include "../modules/sanitize.php";

		include "headerIndex.php";

		//include "headerPage.php";
		include "contactBody.php";
		//include "footer.php";
		
		/* 클래스 파일 로드 */




/* 클래스 파일 로드 */
include "Sendmail.php";

/* 클래스 객체 변수 선언 */
$sendmail = new Sendmail();

/*
 + $to       : 받는사람 메일주소 ( ex. $to="hong <hgd@example.com>" 으로도 가능)
 + $from     : 보내는사람 이름
 + $subject  : 메일 제목
 + $body     : 메일 내용
 + $cc_mail  : Cc 메일 있을경우 (옵션값으로 생략가능)
 + $bcc_mail : Bcc 메일이 있을경우 (옵션값으로 생략가능)
*/
$to="hgd@example.com"; 
$from="Master";
$subject="메일 제목입니다.";
$body="메일 내용입니다.";
$cc_mail="cc@example.com";
$bcc_mail="bcc@example.com";

/* 메일 보내기 */
$sendmail->send_mail($to, $from, $subject, $body,$cc_mail,$bcc_mail)
?>