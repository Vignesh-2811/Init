<?php

include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Announcement</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Title</label>
                                <input type="text" name="name" placeholder="Enter event name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="slug" name="slug" placeholder="Enter slug (event name)" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Poster</label>
                                <input type="file" name="poster" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Short Description</label>
                                <textarea rows="2" type="text" name="shortdescription" placeholder="Enter a short description about the event (max 25 words)" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Registration Link</label>
                                <input name="registrationlink" type="text" placeholder="Enter registration link" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Publish</label>
                                <input type="checkbox" name="publish">
                            </div>
                            <div class="col-md-6">
                                <label for="">Registrations Open</label>
                                <input type="checkbox" name="registrationsopen">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_announcement_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');
