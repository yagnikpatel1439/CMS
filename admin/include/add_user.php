<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    // echo $post_status;
    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' )";

    $insert_post = mysqli_query($connection,$query);

    confirm($insert_post);
}

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories= mysqli_query($connection, $query);

                confirm($select_categories);

                while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['id'];
                $cat_title = $row['title'];
                    
                echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>

   

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" name="post_tags" class="username">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" name="post_tags" class="user_email"> 
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" name="post_tags" class="user_password"> 
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Publish User" name="create_user"> 
    </div>

</form>