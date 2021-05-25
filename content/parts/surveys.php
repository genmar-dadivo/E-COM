<div class="container">
	<div class="row mt-5">
		<h1> Surveys and Polls </h1>
	</div>
	<div class="row mt-3">
        <div class="col">
			<div class="card border-0 shadow-sm">
				<img src="assets/img/survey/swab.jpg" class="card-img-top" style="min-height: 100px;">
				<div class="card-body" style="min-height: 150px;">
					<h5 class="card-title">Swab Testing</h5>
					<p class="card-text survey-desc">
						Your participation to this study is optional.
						Please visit this sites frequently and response as soon as possible when you receive the survey invitation, chances of participating surveys are on the first come first serve basis.
					</p>
				</div>
			</div>
		</div>
        <div class="col">
			<div class="card border-0 shadow-sm">
				<img src="https://picsum.photos/1000/500" class="card-img-top" alt="https://picsum.photos/1000/500">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
        <div class="col">
			<div class="card border-0 shadow-sm">
				<img src="https://picsum.photos/1000/500" class="card-img-top" alt="https://picsum.photos/1000/500">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
	</div>
    <div class="row mt-5">
        <div class="col">
			<div class="card border-0 shadow-sm">
				<img src="https://picsum.photos/1000/500" class="card-img-top" alt="https://picsum.photos/1000/500">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
        <div class="col">
			<div class="card border-0 shadow-sm">
				<img src="https://picsum.photos/1000/500" class="card-img-top" alt="https://picsum.photos/1000/500">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
        <div class="col">
			<div class="card border-0 shadow-sm">
				<img src="https://picsum.photos/1000/500" class="card-img-top" alt="https://picsum.photos/1000/500">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
	</div>
	<div style="min-height: 100px;"></div>
</div>
<script>
	var surveydesc = $('.survey-desc').text();
	alert(surveydesc);
	if (surveydesc.length > 50) {
    	$('.surveydesc').text(surveydesc.substring(0,50) + '.....');
	}
</script>