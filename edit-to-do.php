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

    <title>Task Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $task_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM tasks WHERE id='$task_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $task = mysqli_fetch_array($query_run);
                                ?>
                                <form action="submit.php" method="POST">
                                    <input type="hidden" name="task_id" value="<?= $task['id']; ?>">

                                    <div class="mb-3">
                                        <label>Task Title</label>
                                        <input type="text" name="title" value="<?=$task['title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Description</label>
                                        <input type="text" name="description" value="<?=$task['description'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Due Date</label>
                                        <input type="date" name="due_date" value="<?=$task['due_date'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Status</label>
                                        <input type="text" name="status" value="<?=$task['status'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_task" class="btn btn-primary">
                                            Update Task
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>