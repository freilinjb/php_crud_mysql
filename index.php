<?php
include("db.php");
?>

<?php
include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php
            #Pregunta si existe un mensaje de la sesion para mostrarlo
            if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['message'] ?>!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            }
            ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" placeholder="Task description" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Create At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['create_at'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>

                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                 </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>