<?php
	session_start();
	if (isset($_SESSION['ecom_auth'])) { $ecom_auth = $_SESSION['ecom_auth']; }
	require '../dbase/dbconfig.php';
?>
<div class="container">
	<div class="row mt-5">
		<h1> Surveys and Polls </h1>
	</div>
	<div class="row mt-3">
        <div class="col-sm-4">
			<div class="card border-0 shadow-sm">
				<img src="assets/img/survey/swab.jpg" class="card-img-top" style="min-height: 100px;">
				<div class="card-body" style="min-height: 150px;">
					<h5 class="card-title pointer swabtesting">Symptom Monitoring</h5>
					<p class="card-text" id="surveytext-1">
						Your participation to this study is optional.
						Please visit this sites frequently and response as soon as possible when you receive the survey invitation, chances of participating surveys are on the first come first serve basis.
					</p>
				</div>
			</div>
		</div>
	</div>
    <div class="row mt-5">
	</div>
	<div style="min-height: 100px;"></div>
</div>
<div id="modals">
	<?php
		if (isset($_SESSION['ecom_auth'])) {  
			require 'mdlsysmptoms.php';
		} 
	?>
</div>
<script>
	$('.numberonly').keyup(function(event) { this.value = this.value.replace(/[^0-9.\.]/g,''); });
	$('.letteronly').keyup(function(event) { this.value = this.value.replace(/[^A-Za-zÑñ \.]/g,''); });
	$('.code').keyup(function(event) { this.value = this.value.replace(/[^A-Za-z0-9/\ \.]/g,''); });
	// Sample 
	$("#noneoftheabove").change(function() {
		if(this.checked) {
			$('#fever').prop('checked', false);
			$('#cough').prop('checked', false);
			$('#sorethroat').prop('checked', false);
			$('#shortnessofbreath').prop('checked', false);
			$('#lossofsmellandtaste').prop('checked', false);
			$('#fatigue').prop('checked', false);
			$('#achesandpain').prop('checked', false);
			$('#runnynose').prop('checked', false);
			$('#diarrhea').prop('checked', false);
			$('#headache').prop('checked', false);
		}
	});
	var surveydesc = $('#surveytext-1').text();
	var str50 = surveydesc.split(/\s+/).slice(0,20).join(" "); 
	$('#surveytext-1').html(str50 + ' ... '+ '<a class="readmore pointer">readmore</a>');
	$('#surveytext-1').attr('data-text',surveydesc);

	$('.readmore').click(function() { $(this).parent().html($(this).parent().attr('data-text')) });
	$('.swabtesting').on('click', function(){
		$('#mdlsysmptoms').modal('show');
		$('#mdlsysmptoms').appendTo('body');
	});
	$('#formSwabtesting').on('submit', function(e) {
		$('#btnSubmit').prop("disabled", true);
		$("#btnSubmit").html('Loading ...');
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'content/action/formswabtesting.php',
			data: $('#formSwabtesting').serialize(),
			success: function(data) {
				$.notify({
				message: data,
				},
				{
				type: "minimalist",
				allow_dismiss: false,
				z_index: 9999,
				placement: {
					from: "bottom",
					align: "center"
				},
				animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
				},
				onClosed: setTimeout(function() {
					location.reload();
				}, 3000),
				template: 
				'<div data-notify="container" class="col-xs-6 col-sm-3 alert alert-{0}" role="alert">' +
					'<span data-notify="message">{2}</span>' +
				'</div>'
				});
			}
		});
		});
</script>