<?php

function addProduct($pic, $name, $text, $price, $cat) {
    try {
        include 'connect.php';
        $file_type  = pathinfo($pic['name'], PATHINFO_EXTENSION);
        $accepted_types = array('gif', 'jpg', 'jpeg', 'png');

        if (!in_array($file_type, $accepted_types)) {
            throw new Exception('Wrong file type!');
        }

        $target_path = '../images/' . $pic['name'];
        if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
            throw new Exception('Failed to upload');
        }

        $insert_prod_query = 'INSERT INTO tbl_products(prod_img, prod_name, prod_num, prod_price)';
        $insert_prod_query .= ' VALUES(:pic, :name, :text, :price)';
        $insert_prod   = $pdo->prepare($insert_prod_query);
        $insert_result = $insert_prod->execute(

            array(
                ':pic'       => $pic['name'],
                ':name'      => $name,
                ':text'      => $text,
                ':price'     => $price,

            )
        );

        if (!$insert_result) {
            throw new Exception('Failed to insert');
        }

        $last_id = $pdo->lastInsertId();
        $insert_cat_query = 'INSERT INTO tbl_product_category (prod_id, category_id) VALUES ("'. $last_id.'", :category_id)';
        $insert_cat       = $pdo->prepare($insert_cat_query);
        $insert_cat->execute(

            array(

                ':category_id'  => $cat,
            )
        );

        header("Location: index.php");

    } catch (Exception $e) {

        $error = $e->getMessage();
        return $error;

    }
}

function editProduct($pic, $name, $num, $price, $category) {

      try {
          include 'connect.php';
        if (isset($_GET['update_id'])) {
          $edit_cat = $_GET['update_id'];

        }

        if($pic){
            $product_image_type = $pic['type'];
            $file_type   = pathinfo($pic['name'], PATHINFO_EXTENSION);
            $accepted_types = array('gif', 'jpg', 'jpeg', 'png');

            if (!in_array($file_type, $accepted_types)) {
                throw new Exception('File type not supported');

            }

            $target_path = '../images/' . $pic['name'];

            if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
                throw new Exception('Failed to upload');

            }

            $query = "UPDATE tbl_products SET prod_name = :product_name, prod_img = :product_image, prod_num = :product_text, prod_price = :product_price; WHERE prod_id = :product_id";

            $edit_product = $pdo->prepare($query);
            $edit_product->execute(

            array(

                ':product_image' => $pic,
                ':product_name' => $name,
                ':product_price' => $price,
                ':product_num' => $num,
                ':product_id' => $edit_cat,

            )

            );

            if (!$edit_product) {
            throw new Exception('Failed to update');
            }

        } else {

            $query = "UPDATE tbl_products SET prod_name = :product_name, prod_price = :product_price, prod_num = :product_num WHERE prod_id = :product_id";

            $edit_product = $pdo->prepare($query);
            $edit_product->execute(

            array(

                ':product_name' => $name,
                ':product_price' => $price,
                ':product_num' => $num,
                ':product_id' => $edit_cat,

            )

            );

        }



    if($category){

        $change_cat_query = "UPDATE tbl_product_category SET category_id = :category_id WHERE prod_id = :product_id";
        $change_cat = $pdo->prepare($change_cat_query);
        $change_cat->execute(

            array(

                ':product_id' => $edit_cat,
                ':category_id' => $category
            )
        );

        if (!$change_cat) {

            throw new Exception('Failed to change');
        }
    }

    } catch (Exception $e) {

        $error = $e->getMessage();
        return $error;

    }
}            



function deleteProduct($id){



	include('connect.php');
	$delete_prod_query = 'DELETE FROM tbl_products WHERE prod_id = :id';
	$delete_prod = $pdo->prepare($delete_prod_query);
	$delete_prod->execute(

		array(

			':id'=>$id

		)
    );


	if($delete_prod){
		redirect_to('../admin_product.php');

	}else{

		$message = 'Not deleted';
		return $message;

	}

}