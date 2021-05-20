<div class="container">
    <div class="row mt-5">
        <h1> CONTACT US </h1>
    </div>
    <div class="row">
        <div class="container">
            <form id="formContact">
                <div class="mt-5">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 shadow-sm" id="emailaddress" placeholder="name@example.com" autocomplete="off" name="emailaddress" required>
                        <label for="emailaddress">Email address</label>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="form-floating">
                        <select class="form-select border-0 shadow-sm" id="concerncategory" name="concerncategory" required>
                        <option selected value="" disabled>What's this about?</option>
                        <option value="1">Report</option>
                        <option value="2">Emergency</option>
                        <option value="3">Feedbacks</option>
                        <option value="4">Others</option>
                        </select>
                        <label for="concerncategory">Concern</label>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="form-floating">
                        <textarea class="form-control border-0 shadow-sm" placeholder="Go ahead, we're listening" id="detailsfield" style="min-height: 200px; resize: none;" name="detailsfield"></textarea>
                        <label for="detailsfield" required>Details</label>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn custom-btn-1 btn-lg"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // CONTACT US
    $('#formContact').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'content/action/formcontact.php',
            data: $('#formContact').serialize(),
            success: function(data) {
                Push.create("E-COM", {
                    body: data,
                    onClick: function() {
                        window.focus();
                        this.close();
                    },
                });
            }
        });
    });
</script>