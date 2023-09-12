<?php
    session_start();
    require 'database.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>TO DO LIST</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Details
                            <a href="create-to-do.php" class="btn btn-primary float-end">Add Tasks</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM tasks";
                                    $query_run = mysqli_query($con, $query);
                                    $count = 1;

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $task)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                
                                                <td><?= $task['title']; ?></td>
                                                <td><?= $task['description']; ?></td>
                                                <td><?= $task['due_date']; ?></td>
                                                <td><?= $task['status']; ?></td>
                                                <td>
                                                    <a href="view.php?id=<?= $task['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="edit-to-do.php?id=<?= $task['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="submit.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_task" value="<?=$task['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>