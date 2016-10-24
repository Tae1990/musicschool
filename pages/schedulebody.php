<link href="../css/bootstrap.min.css" rel="stylesheet">
<?php
		include "logininfo.php";
?>


 <script type="text/javascript">    //resize해주는 아주 소중한 함수 ㅠㅠ
   $(document).ready(function(){
   $('.adminPage').css('width', $(window).width() - 50 );
   $('.adminPage').css('height', $(window).height() - 50 );
   $(window).resize(function() {
        $('.adminPage').css('width', $(window).width() - 50 );
        $('.adminPage').css('height', $(window).height() - 50 );
   });
}); 

</script>



<div class="adminPage">
 <div id="wrapper">
				<div class="adminScedule">
					<?php
						include "scheduleing.php";
					?>
				</div><!--ownerPage-->      
    </div>
    <!-- /#wrapper -->
</div><!--ownerPage-->








