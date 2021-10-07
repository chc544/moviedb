<?php
require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    if (!empty($file["movImg"]["tmp_name"])) {
        move_uploaded_file($file["movImg"]["tmp_name"], "uploads/" . basename($file["movImg"]["name"]));
    }

    $sql = "INSERT INTO movie (movId, movName, movDesc, movRelDate, movRating, movActors, movProducers, movType, movReview, movImg, movCat) VALUES (DEFAULT, :movName, :movDesc, :movRelDate, :movRating, :movActors, :movProducers, :movType, :movReview, :movImg, :movCat)";
    $bind = [
        ":movName" => $data["movName"],
        ":movDesc" => $data["movDesc"],
        ":movRelDate" => $data["movRelDate"],
        ":movRating" => $data["movRating"],
        ":movActors" => $data["movActors"],
        ":movProducers" => $data["movProducers"],
        ":movType" => $data["movType"],
        ":movReview" => $data["movReview"],
        ":movImg" => (!empty($file["movImg"]["tmp_name"])) ? $file["movImg"]["name"] : NULL,
        ":movCat" => $data["movCat"],
    ];

    $db->sql($sql, $bind, false);


    echo include 'includes/success.php';
    exit;
}

?>

<?php include 'includes/top.php'; ?>

    <div class="top-spacer"></div>

    <h3 class="headline">Add Movie / Show</h3>
    <hr>
    <p class="subheading">Fields with * is required.</p>
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movName">Title*</label>
                    <div class="inner-addon right-addon">
                        <i class="glyphicon fas fa-heading"></i>
                        <input class="form-control" type="text" name="data[movName]" id="movName" placeholder="Title"
                               value="" required>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movRelDate">Release Date*</label>
                    <input class="form-control" type="date" name="data[movRelDate]" id="movRelDate"
                           placeholder="Release Date" value="" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="genre">Categories*</label>
                    <div class="inner-addon right-addon">
                        <i class="glyphicon fas fa-theater-masks"></i>
                        <select class="selectpicker" name="data[movCat]" type="text" id="movCat"
                                placeholder="Choose categories..." required multiple aria-label="Categories">
                            <option value="Action">Action</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Drama">Drama</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Horror">Horror</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Romance">Romance</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="9">Thriller</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movType">Movie or Show?*</label>
                    <div class="inner-addon right-addon">
                        <i class="glyphicon fas fa-film"></i>
                        <select class="selectpicker" name="data[movType]" id="movType" placeholder="Choose type..."
                                value="" required aria-label="Categories">
                            <option value="Movie">Movie</option>
                            <option value="Show">Show</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movActors">Actors</label>
                    <div class="inner-addon right-addon">
                        <i class="glyphicon fas fa-signature"></i>
                        <input class="form-control" type="text" name="data[movActors]" id="movActors"
                               placeholder="John Doe, Jane Doe"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movProducers">Producers</label>
                    <div class="inner-addon right-addon">
                        <i class="glyphicon fas fa-address-card"></i>
                        <input class="form-control" type="text" name="data[movProducers]" id="movProducers"
                               placeholder="Producers" value="">
                    </div>
                </div>
            </div>
            <div class=col-md-6">
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movDesc">Description</label>
                    <textarea class="form-control" type="text" name="data[movDesc]" id="movDesc"
                              placeholder="Description"
                              value="" style="height: 300px"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="movReview">Review</label>
                    <textarea class="form-control" type="text" name="data[movReview]" id="movReview"
                              placeholder="Review"
                              value="" style="height: 300px"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <br>
                <label class="form-label" for="movImg">Poster Image</label>
                <input type="file" class="form-control" id="movImg" name="movImg">
            </div>
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <div class="rate">
                        <input type="radio" id="star5" name="data[movRating]" value="5" class="d-none"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="data[movRating]" value="4" class="d-none"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="data[movRating]" value="3" class="d-none"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="data[movRating]" value="2" class="d-none"/>
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="data[movRating]" value="1" class="d-none"/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <br>
                <div class="form-group">
                    <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Submit Movie</button>
                </div>
            </div>
        </div>
    </form>



    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>

<?php include 'includes/bottom.php'; ?>