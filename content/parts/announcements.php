<?php
	require '../dbase/dbconfig.php';
?>
<div class="container">
	<div class="row mt-5">
		<h1> Announcements </h1>
	</div>
	<?php
	$sql = "SELECT * FROM announce ORDER BY id DESC";
	$stm = $con->prepare($sql);
	$stm->execute();
	$results = $stm->fetchAll(PDO::FETCH_ASSOC);
	$counter = 0;
    if ($stm->rowCount() >= 1) {
	foreach ($results as $row) {
	$id = $row['id'];
	$title = ucwords(strtolower($row['title']));
    $subtitle = ucwords(strtolower($row['subtitle']));
    $announcedescription = ucfirst(strtolower($row['announcedescription']));
	?>
	<div class="row mt-3">
		<div class="card border-0 shadow">
			<div class="card-body">
			  	<h5 class="card-title"> <?php echo $title; ?> </h5>
			  	<h6 class="card-subtitle mb-2 text-muted"> <?php echo $subtitle; ?> </h6>
			 	<p class="card-text announcementdesc"> <?php echo $announcedescription; ?> </p>
			</div>
		</div>
	</div>
	<?php
	}
	}
	?>
	<div class="footer-div mb-5"> &nbsp; </div>
</div>
<script>
	var surveydesc = $('.announcementdesc').text();
	var str50 = surveydesc.split(/\s+/).slice(0,20).join(" "); 
	$('.announcementdesc').html(str50 + ' ... '+ '<a class="readmore pointer">readmore</a>');
	$('.announcementdesc').attr('data-text',surveydesc);

	$('.readmore').click(function() { $(this).parent().html($(this).parent().attr('data-text')) });
</script>