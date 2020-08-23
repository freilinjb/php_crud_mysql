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

                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['message'] ?>!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php }
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

        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>