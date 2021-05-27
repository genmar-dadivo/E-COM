<div class="modal fade" id="mdlsysmptoms" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-body custom-bg-2">
				<form id="formSwabtesting">
					<input type="hidden" name="user" value="<?php echo strtolower($ecom_auth); ?>">
					<div class="row mt-5">
						<div class="col">
							<h3 class="lead">
								<small class="text-muted">Symptom Monitoring</small>
							</h3>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-sm-6">
							<div class="form-floating mb-3">
								<input type="text" class="form-control border-0 shadow-sm numberonly" maxlength="4" name="temperature" id="temperature" placeholder="Temperature" autocomplete="off" required>
								<label for="temperature">Temperature</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-floating mb-3">
								<input type="text" class="form-control numberonly border-0 shadow-sm numberonly" autocomplete="off" maxlength="3" id="age" name="age" placeholder="Age" required>
								<label for="age">Age</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating">
								<select class="form-select border-0 shadow-sm" id="gender" name="gender" aria-label="Floating label select" required>
								  <option value="" disabled selected>Gender</option>
								  <option value="0"> Male </option>
								  <option value="1"> Female </option>
								</select>
								<label for="gender">Gender</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<h3 class="lead">
								<small class="text-muted">Did he/she experience any of the following?</small>
							</h3>
							<small class="text-success fw-bold">Did he/she experience any of the following?</small>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="fever" name="fever">
								<label class="form-check-label" for="fever">
									Fever
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="cough" name="cough">
								<label class="form-check-label" for="cough">
									Cough
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="sorethroat" name="sorethroat">
								<label class="form-check-label" for="sorethroat">
									Sore Throat
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="shortnessofbreath" name="shortnessofbreath">
								<label class="form-check-label" for="shortnessofbreath">
									Shortness of Breath
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="lossofsmellandtaste" name="lossofsmellandtaste">
								<label class="form-check-label" for="lossofsmellandtaste">
									Loss of Smell and Taste
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<small class="text-success fw-bold">Some Patients may also have:</small>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="fatigue" name="fatigue">
								<label class="form-check-label" for="fatigue">
									Fatigue
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="achesandpain" name="achesandpain">
								<label class="form-check-label" for="achesandpain">
									Aches and Pain
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="runnynose" name="runnynose">
								<label class="form-check-label" for="runnynose">
									Runny Nose
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="diarrhea" name="diarrhea">
								<label class="form-check-label" for="diarrhea">
									Diarrhea
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="headache" name="headache">
								<label class="form-check-label" for="headache">
									Headache
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" id="noneoftheabove">
								<label class="form-check-label" for="noneoftheabove">
									None of the above
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-3">
						<div class="col">
							<?php
							$sql = "SELECT user FROM actionlog WHERE subid = 1 AND actiontype = 1 AND user = '$ecom_auth' ";
							$stm = $con->prepare($sql);
							$stm->execute();
							if ($stm->rowCount() >= 1) {
							?>
							<button type="submit" class="btn btn-primary" id="btnSubmit" disabled> Answered </button>
							<?php
							}
							else {
							?>
							<button type="submit" class="btn btn-primary" id="btnSubmit"> Submit </button>
							<?php
							}
							?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>