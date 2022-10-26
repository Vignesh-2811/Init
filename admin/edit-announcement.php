<?php

include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $announcement = getByID("announcement", $id);
                // print_r($announcement);die;

                if (mysqli_num_rows($announcement) > 0) {
                    $data = mysqli_fetch_array($announcement);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Announcement</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="announcement_id" value="<?= $data['id'] ?>">
                                        <label for="">Title</label>
                                        <input type="text" name="name" value="<?= $data['title'] ?>" placeholder="Enter event name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="slug" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter slug (event name)" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Poster</label>
                                        <input type="file" name="poster" class="form-control">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_poster" value="<?= $data['poster'] ?>">
                                        <img src="../uploads/<?= $data['poster'] ?>" height="50px" width="50px" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Short Description</label>
                                        <textarea rows="2" type="text" name="shortdescription" placeholder="Enter a short description about the event (max 25 words)" class="form-control"><?= $data['shortdescription'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="description" rows="3" placeholder="Enter description" class="form-control"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Registration Link</label>
                                        <input name="registrationlink" value="<?= $data['registrationlink'] ?>" type="text" placeholder="Enter registration link" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Publish</label>
                                        <input type="checkbox" <?= $data['publish'] ? "checked":"" ?> name="publish">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Registrations Open</label>
                                        <input type="checkbox" <?= $data['registrationsopen'] ? "checked":"" ?> name="registrationsopen">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_announcement_btn">Update</button>
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
