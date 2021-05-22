<?php
    session_start();
    if (!isset($_SESSION['ecom_auth']) ) {
    ?>
        <script>
            loadcontent(1);
        </script>
    <?php
    }
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6">
            <div class="col-sm-3">
                <img src="assets/img/user.jpg" class="img-thumbnail border-0 rounded float-start" alt="profile" style="max-width: 150px;">
            </div>
            <div class="col-sm-4 offset-sm-5 mt-3">
                <h3> Username </h1>
            </div>
        </div>
    </div>
</div>