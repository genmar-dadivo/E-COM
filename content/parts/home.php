<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="carhome" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    require '../dbase/dbconfig.php';
                    $sql = "SELECT * FROM adminhome WHERE type = 1 AND status = 1";
                    $stm = $con->prepare($sql);
                    $stm->execute();
                    $results = $stm->fetchAll(PDO::FETCH_ASSOC);
                    if ($stm->rowCount() >= 1) {
                    $activecapture = 0;
                    foreach ($results as $row) {
                    $id = $row['id'];
                    $type = $row['type'];
                    $title = ucwords(strtolower($row['title']));
                    $file = $row['file'];
                    $date = date('Y-m-d', strtotime($row['date']));
                    ?>
                    <button type="button" data-bs-target="#carhome" data-bs-slide-to="<?php echo $activecapture; ?>" class="<?php if($activecapture == 0) { echo "active"; } ?>" aria-current="true"></button>
                    <?php 
                    $activecapture ++;
                    }
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    require '../dbase/dbconfig.php';
                    $sql = "SELECT * FROM adminhome WHERE type = 1 AND status = 1";
                    $stm = $con->prepare($sql);
                    $stm->execute();
                    $results = $stm->fetchAll(PDO::FETCH_ASSOC);
                    if ($stm->rowCount() >= 1) {
                    $activecapture = 0;
                    foreach ($results as $row) {
                    $id = $row['id'];
                    $type = $row['type'];
                    $title = ucwords(strtolower($row['title']));
                    $assetdescription = ucwords(strtolower($row['assetdescription']));
                    $file = $row['file'];
                    $date = date('Y-m-d', strtotime($row['date']));
                    ?>
                    <div class="carousel-item <?php if($activecapture == 0) { echo "active"; } ?>">
                        <img src="assets/img/home/<?php echo $file; ?>" class="d-block w-100 img-fluid" alt="" style="max-height: 500px;min-height: 500px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-dark"><?php echo $title; ?></h5>
                            <p class="text-dark"><?php echo $assetdescription; ?></p>
                        </div>
                    </div>
                    <?php 
                    $activecapture ++;
                    }
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carhome" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carhome" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>