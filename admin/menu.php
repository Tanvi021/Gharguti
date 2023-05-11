<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Our Menu
                        <a href="index.php" class="btn btn-info float-end text-white">Back to Dashboard</a>
                    </h4>
                </div>
                <div class="card-body" id="menu_table">
                    <table class="table table-boredered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $menu = getAll("menu");
                                
                                if(mysqli_num_rows($menu) > 0)
                                {
                                    foreach($menu as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td>
                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                </td>
                                                <td> 
                                                    <?= $item['status'] == '0'? "Visible":"Hidden" ?> 
                                                </td>
                                                <td>
                                                    <a href="edit-menu.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <!-- <form action="code.php" method="POST">
                                                        <input type="hidden" name="menu_id" value="<?= $item['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name="delete_menu_btn">Delete</button>
                                                    </form> -->
                                                    <button type="button" class="btn btn-sm btn-danger delete_menu_btn" value="<?= $item['id']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                echo "No records found";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>


<?php include('includes/footer.php'); ?>