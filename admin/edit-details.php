<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $announcement = getByID("announcementdetails", $id);
                // print_r($announcement);die;

                if (mysqli_num_rows($announcement) > 0) {
                    $data = mysqli_fetch_array($announcement);
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Details</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                                <input type="hidden" name="organiser" value="<?= $_SESSION['auth_user']['name']; ?>">
                            <div class="col-md-12">
                                <label for="">Select Event</label>
                                <select name="announcementid" class="form-select">
                                    <option selected>Select Event</option>
                                    <?php
                                    $name = $_SESSION['auth_user']['name'];
                                    $announcements = getAnn("announcement", "$name");

                                    if (mysqli_num_rows($announcements) > 0) {
                                        foreach ($announcements as $item) {
                                    ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['title']; ?></option>


                                    <?php
                                        }
                                    } else {
                                        echo "No Category Available";
                                    }


                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Event Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="eventtype" id="flexRadioDefault1" value="online">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Online
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="eventtype" id="flexRadioDefault2" value="offline">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Offline
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Payment</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault3" value="free">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Free
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault4" value="paid">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        Paid
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Category</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="flexRadioDefault5" value="technical">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Technical
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="flexRadioDefault6" value="non-technical">
                                    <label class="form-check-label" for="flexRadioDefault6">
                                        Non - Technical
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Venue</label>
                                <input name="venue" type="text" placeholder="Enter Venue" class="form-control" value="<?= $data['venue'] ?>">
                            </div>

                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Start Date</label>
                                <input name="startdate" type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">End Date</label>
                                <input name="enddate" type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Timings from</label>
                                <input name="timingsfrom" type="time" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Timings to</label>
                                <input name="timingsto" type="time" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Prerequisites</label>
                                <textarea name="prerequisites" rows="2" placeholder="Prerequisites" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Youtube Video (If any)<a href="https://support.google.com/youtube/answer/171780?hl=en" target="_blank"> Click here to get embed link </a></label>
                                <input name="youtubelink" type="text" placeholder="Enter youtube link" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Payment</label>
                                <input name="paymentdetails" type="text" placeholder="Enter payment details" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Registration / Website link</label>
                                <input name="registrationlink" type="text" placeholder="Enter registration or website link" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Contact Details person 1</label>
                                <input name="contactperson1name" type="text" placeholder="Enter person 1 name" class="form-control"><br>
                                <input name="contactperson1number" type="number" placeholder="Enter person 1 number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Contact Details person 2</label>
                                <input name="contactperson2name" type="text" placeholder="Enter person 2 name" class="form-control"><br>
                                <input name="contactperson2number" type="number" placeholder="Enter person 2 number" class="form-control">
                            </div>
                            <br>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_details_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                } else {
                    echo "Announcement not found";
                }
            } else {
                echo "ID missing from URL";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php');
