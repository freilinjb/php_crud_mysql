<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    #Para comprobar cuantas filas tiene el resultado de la consulta

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_row($result);
        $title = $row[1];
        $description = $row[2];
    } 
}
#Si existe el dato UPDATE eso quiere decir que se va a actualizar del mismo form

if(isset($_POST['update'])) {
    echo "Updating";
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Ingrerse el titulo">
                    </div>
                    <div class="form-group">
                        <textarea rows="2" name="description" class="form-control" placeholder="Update Description"><?php echo $description?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>