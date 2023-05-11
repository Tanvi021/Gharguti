<?php

include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_menu_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;


    $menu_query = "INSERT INTO menu
    (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

    $menu_query_run = mysqli_query($con,$menu_query);

    if($menu_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("add-menu.php", "Menu Added sucessfully");
    }
    else
    {
        redirect("add-menu.php","Something went wrong");
    }
}
else if(isset($_POST['update_menu_btn']))
{
    $menu_id = $_POST['$menu_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    $path = "../uploads";

    $update_query = "UPDATE menu SET name='$name', slug='$slug', description='$description',
    meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords',
    status='$status', popular='$popular', image='$update_filename' WHERE id='$menu_id' ";

    $update_query_run = mysqli_query($con, $update_query);
    
    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-menu.php?id=$menu_id","Menu Updated Successfully");
    }
    else
    {
        redirect("edit-menu.php?id=$menu_id","Something went wrong");
    }
    
}
else if(isset($_POST['delete_menu_btn']))
{
    $menu_id = mysqli_real_escape_string($con, $_POST['menu_id']);

    $menu_query = "SELECT * FROM menu WHERE id='$menu_id' ";
    $menu_query_run = mysqli_query($con, $menu_query);
    $menu_data = mysqli_fetch_array($menu_query_run);
    $image = $menu_data['image'];

    $delete_query = "DELETE FROM menu WHERE id='$menu_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("menu.php", "Menu deleted successfully");
        echo 200;
    }
    else
    {
        //redirect("menu.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['add_product_btn']))
{
    $menu_id = $_POST['menu_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if($name != "" && $slug != "" && $description != "")
    {
        $product_query = "INSERT INTO products (menu_id,name,slug,small_description,description,original_price,selling_price,
        qty,meta_title,meta_keywords,meta_description,status,trending,image) VALUES 
        ('$menu_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title',
        '$meta_keywords','$meta_description','$status','$trending','$filename')";
        
        $product_query_run=mysqli_query($con, $product_query);
        
        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            
            redirect("add-product.php", "Food-Item Added sucessfully");
        }
        else
        {
            redirect("add-product.php", "Something went wrong");
        }
    }
    else
    {
        redirect("add-product.php", "All fields are mandatory");
    }

}
else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $menu_id = $_POST['menu_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE products SET menu_id='$menu_id',name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',
    qty='$qty',meta_title='$meta_title',meta_keywords='$meta_keywords',meta_description='$meta_description',status='$status',trending='$trending',image='$update_filename' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id","Food-Item Updated Successfully");
    }
    else
    {
        redirect("edit-product.php?id=$product_id","Something went wrong");
    }
}
else if(isset($_POST['delete_product_btn']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("products.php", "Food-Item deleted successfully");
        echo 200;
    }
    else{
        //redirect("products.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['update_order_btn']))
{
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no' ";
    $updateOrder_query_run = mysqli_query($con,$updateOrder_query);

    redirect("view-order.php?t=$track_no","Order status updated successfully");
}
else
{
    header('Location: ../index.php');
}
?>