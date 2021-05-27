<?php 
	session_start();+
	require '../dbase/dbconfig.php';
	if (isset($_SESSION['ecom_auth'])) {
		$ecom_auth = $_SESSION['ecom_auth'];
		$sql = "SELECT * FROM tuser WHERE email = '$ecom_auth'";
		$stm = $con->prepare($sql);
		$stm->execute();
		$row = $stm->fetch();
		$lvl = $row['lvl'];
		$fname = ucwords(strtolower($row['fname']));
		$status = $row['status'];
	}
	else {
		$fname = '';
		$status = '';
	}
?>
<div class="sidebar-content">
	<div class="sidebar-brand">
		<div id="close-sidebar" class="fw-lighter custom-fp-1 pointer">
			<span>
			    <i class="fa fa-times-circle"></i>
			</span>
		</div>
	</div>
	<div class="sidebar-header">
		<div class="user-pic">
			<img class="img-responsive img-rounded" src="../../assets/img/user.jpg" alt="User picture">
		</div>
		<div class="user-info">
			<span class="user-name">
			    <?php echo $fname; ?>
			</span>
			<span class="user-status">
				<?php
				if($status == 1) {
				?>
			    <i class="fa fa-circle"></i>
			    <span>
					Online
				</span>
				<?php
				}
				?>
			</span>
		</div>
	</div>
	<div class="sidebar-menu">
		<ul>
			<li class="header-menu" style="opacity: 0;">
				<span>Home</span>
			</li>
			<li>
				<a class="pointer" onclick="adminpage(1)">
					<i class="fa fa-home"></i>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a class="pointer" onclick="adminpage(2)">
					<i class="fa fa-calendar"></i>
					<span>Event</span>
				</a>
			</li>
			<li>
				<a class="pointer" onclick="adminpage(3)">
					<i class="fas fa-bullhorn"></i>
					<span>Announcement</span>
				</a>
			</li>
			<li>
				<a class="pointer" onclick="adminpage(4)">
					<i class="fas fa-bullhorn"></i>
					<span>Survey</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="sidebar-footer hidden">
	<a class="pointer" id="back">
	    <i class="fa fa-arrow-left back"></i>
	</a>
    <a onclick="logout();" class="pointer">
	    <i class="fa fa-power-off"></i>
	</a>
</div>
<script>
	$(".sidebar-dropdown > a").click(function() {
	   $(".sidebar-submenu").slideUp(200);
	   if ($(this).parent().hasClass("active")) {
	      $(".sidebar-dropdown").removeClass("active");
	      $(this).parent().removeClass("active");
	   }
	   else {
	      $(".sidebar-dropdown").removeClass("active");
	      $(this).next(".sidebar-submenu").slideDown(200);
	      $(this).parent().addClass("active");
	   }
	});
	$("#close-sidebar").click(function() { $(".page-wrapper").removeClass("toggled");});
	$("#show-sidebar").click(function() { $(".page-wrapper").addClass("toggled"); });
	$("#page-content").click(function(e) {
	   if (e.ctrlKey) {
	      if ($(".page-wrapper").hasClass("toggled")) { $(".page-wrapper").removeClass("toggled"); }
	      else { $(".page-wrapper").addClass("toggled"); }
	   }
	});
	function logout() {
	   Cookies.remove('pageid');
	   Cookies.remove('adminpageid');
	   $.ajax({
	      type: "GET",
	      url: '../../content/action/formlogout.php',
	      success: function(data) { location.reload(); }
	   });
	}
    $(".back, #back").click(function(e) {
        window.location.replace('../../');
        Cookies.set('pageid', 1);
	});
</script>