<?php include("db.php") ?>

<?php include("includes/header.php")?>

    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?>   

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control"
                            placeholder="Titulo de la tarea" autofocus>
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripción de la tarea"></textarea>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success w-100" name="save_task" value="Guardar tarea">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $query = "SELECT * FROM task";
                            $result_task = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_task)){ ?>

                                <tr>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <a class = "btn btn-secondary" style="text-decoration: none" href="edit.php?id=<?php echo $row['id'] ?>">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a class = "btn btn-danger" style="text-decoration: none" href="delete_task.php?id=<?php echo $row['id'] ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php }?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

<?php include("includes/footer.php")?>-