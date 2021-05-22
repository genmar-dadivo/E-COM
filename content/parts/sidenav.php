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
			    {fname}
			</span>
			<span class="user-role">{pos}</span>
			<span class="user-status">
			    <i class="fa fa-circle"></i>
			    <span>{status}</span>
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
				<i class="fa fa-upload"></i>
				<span>Home</span>
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
	   Cookies.remove('appid');
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