<?php
include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Announcements</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Poster</th>
                                <th>publish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $announcement = getAll("announcement");
                            
                            if(mysqli_num_rows($announcement) > 0)
                            {
                                foreach($announcement as $item){
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['title'] ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['poster'] ?>" width="50px" height="50px" alt="<?= $item['poster'] ?>">
                                        </td>
                                        <td>
                                            <?= $item['publish'] == '1'? "Visible":"Hidden" ?>
                                        </td>

                                        <td>
                                            <a href="edit-announcement.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="announcement_id" value=" <?= $item['id']; ?>">
                                                <button type="Submit" class="btn btn-danger" name="delete_announcement_btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                echo "No records found";
                            }
                                
                                ?>
                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');