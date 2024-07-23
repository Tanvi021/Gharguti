<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <a href="add-menu.php">
                                <i class="material-icons opacity-10">add</i>
                                </a>
                            </div>
                            <div class="text-end pt-1">
                                <h4 class="mb-0"><a href="add-menu.php">Add Menu
                                    <br>
                                    <br>
                                </a></h4>
                            </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Add menu from here <br>
                            <br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                <a href="menu.php">
                                    <i class="material-icons opacity-10">table_view</i>
                                </a>
                            </div>
                            <div class="text-end pt-1">
                                <h4 class="mb-0"><a href="menu.php">All Menu
                                    <br>
                                    <br>
                                </a></h4>
                            </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>List of all menu or update menu</p>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success shadow text-center border-radius-xl mt-n4 position-absolute">
                                <a href="add-product.php">
                                    <i class="material-icons opacity-10">add</i>
                                </a>
                            </div>
                            <div class="text-end pt-1">
                                <h4 class="mb-0"><a href="add-product.php">Add 
                                    <br>
                                    Food-items</a></h4>
                            </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Add Food-items from here <br>
                            <br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div 
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <a href="products.php">
                                    <i class="material-icons opacity-10">table_view</i>
                                </a>
                            </div>
                            <div class="text-end pt-1">
                                <h4 class="mb-0"><a href="products.php">All
                                    <br>
                                    Food-items</a></h4>
                            </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                            <p class="mb-0">List of all Food-items or update Food-items
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <a href="orders.php">
                                <i class="material-icons opacity-10">table_view</i>
                                </a>
                            </div>
                            <div class="text-end pt-1">
                                <h4 class="mb-0"><a href="orders.php">Orders
                                    <br>
                                    <br>
                                </a></h4>
                            </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>All Orders can be visible here & status can be updated
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>