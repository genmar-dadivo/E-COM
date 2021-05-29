<?php
    session_start();
    require '../../content/dbase/dbconfig.php';
    date_default_timezone_set("Asia/Manila");
    $datetimenow = date('YmdHis');
    if (isset($_SESSION['ecom_auth']) ) { $email = strtolower($_SESSION['ecom_auth']); }
    else { $email = ''; }
?>
<div class="container">
    <div class="row mt-5">
        <h1 class="formtitle"> CONTACT US </h1>
    </div>
    <div class="row">
        <div class="container">
            <form id="formContact" class="contactusform">
                <div class="mt-5">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 shadow-sm" id="emailaddress" placeholder="name@example.com" value="<?php echo $email; ?>" autocomplete="off" name="emailaddress" required>
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
            <?php
            if (isset($_SESSION['ecom_auth']) ) {
            $ecom_auth = $_SESSION['ecom_auth'];
            $sql = "SELECT lvl FROM tuser WHERE email = '$ecom_auth'";
            $stm = $con->prepare($sql);
            $stm->execute();
            $row = $stm->fetch();
            $lvl = $row['lvl'];
            if ($lvl == 2) {
            ?>
            <div class="livechatform hidden">
                <form id="formLivechat">
                    <input type="hidden" name="user" value="<?php echo $ecom_auth; ?>">
                    <div class="mt-2">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select border-0 shadow-sm" id="lcconcerncategory" name="lcconcerncategory" required>
                                <option selected value="" disabled>What's this about?</option>
                                <option value="1">Report</option>
                                <option value="2">Emergency</option>
                                <option value="3">Feedbacks</option>
                                <option value="4">Others</option>
                                </select>
                                <label for="lcconcerncategory">Concern</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="form-floating">
                                <textarea class="form-control border-0 shadow-sm" placeholder="Go ahead, we're listening" id="lcdetailsfield" style="min-height: 200px; resize: none;" name="lcdetailsfield"></textarea>
                                <label for="lcdetailsfield" required>Details</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn custom-btn-1 btn-lg"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            }
            }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['ecom_auth']) ) {
$ecom_auth = $_SESSION['ecom_auth'];
$sql = "SELECT lvl FROM tuser WHERE email = '$ecom_auth'";
$stm = $con->prepare($sql);
$stm->execute();
$row = $stm->fetch();
$lvl = $row['lvl'];
if ($lvl == 2) {
?>
<div class="btn-group-fab" role="group">
    <div>
        <button type="button" class="btn btn-main custom-bg-1 livechat">
            <i class="far fa-comment-alt"></i>
            Chat
        </button>
    </div>
</div>
<?php
}
}
?>
<script>
    // CONTACT US
    $('#formContact').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'content/action/formcontact.php',
            data: $('#formContact').serialize(),
            success: function(data) {
                alert(data);
            }
        });
    });
    $('.livechat').on('click', function(){
        $('.contactusform').toggleClass('hidden');
        $('.livechatform').toggleClass('hidden');
        var formtitle = $('.formtitle').text();
        if (formtitle === "LIVE CHAT") {
            $('.formtitle').text('CONTACT US');
        }
        else { $('.formtitle').text('LIVE CHAT'); }
    });
    // LIVE CHAT
    $('#formLivechat').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'content/action/formlivechat.php?i',
            data: $('#formLivechat').serialize(),
            success: function(data) {
                var win = window.open('content/parts/livechat.php?r=' + data, '_blank');
                if (win) {  win.focus(); } 
                else { alert('Please allow popups for this website'); }
            }
        });
    });
</script>