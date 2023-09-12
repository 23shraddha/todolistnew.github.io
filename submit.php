<?php
session_start();
require 'database.php';

if(isset($_POST['delete_task']))
{
    $task_id = mysqli_real_escape_string($con, $_POST['delete_task']);

    $query = "DELETE FROM tasks WHERE id='$task_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Task Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_task']))
{
    $task_id = mysqli_real_escape_string($con, $_POST['task_id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $due_date = mysqli_real_escape_string($con, $_POST['due_date']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE tasks SET title='$title', description='$description', due_date='$due_date', status='$status' WHERE id='$task_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Task Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_task']))
{ 

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $due_date = mysqli_real_escape_string($con, $_POST['due_date']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "INSERT INTO tasks (title,description,due_date,status) VALUES ('$title','$description','$due_date','$status')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Task Created Successfully";
        header("Location: create-to-do.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Created";
        header("Location: create-to-do.php");
        exit(0);
    }
}

?>