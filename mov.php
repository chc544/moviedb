<?php include 'includes/top.php'; ?>


<?php
require "settings/init.php";
$id = $_GET["id"];

$bind = [":movId" => $id];
$movie = $db->sql("SELECT * FROM movie WHERE movId = :movId", $bind);
$movie = $movie[0];

?>

    <div class="top-spacer"></div>
    <div class="row">
        <div class="col">
            <h3 class="headline"><?php echo $movie->movName; ?></h3>
            <div class="ratingsmall">
                <i class="fas fa-star"></i>
                <?php echo $movie->movRating; ?>/5
            </div>
        </div>
        <div class="col">
            <h3 class="headline">
                <div class="ratingbig">
                <i class="fas fa-star"></i>
                <?php echo $movie->movRating; ?>/5
                </div>
            </h3>
        </div>
    </div>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <img src="uploads/<?php echo $movie->movImg; ?>" alt="Avengers: Endgame" style="height: 400px">
            </div>
            <div class="col-1"></div>
            <div class="col-lg-8 col-md-7 col-sm-12">
                <br>
                <h6>
                    Type: <?php echo $movie->movType; ?> -
                    Category: <?php echo $movie->movCategory; ?>
                </h6>
                <h6>
                    Directors: <?php echo $movie->movProducers; ?>
                </h6>
                <h6>
                    Stars: <?php echo $movie->movActors; ?>
                </h6>
                <h6>
                    Release Date: <?php echo $movie->movRelDate; ?>
                </h6>
                <br>
                <h5>Description</h5>
                <?php echo $movie->movDesc; ?>
                <br>
                <div class="ratingbig">
                <h5>Review</h5>
                <?php echo $movie->movReview; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ratingsmall">
                        <br>
                        <h5>Review</h5>
                        <?php echo $movie->movReview; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'includes/bottom.php'; ?>