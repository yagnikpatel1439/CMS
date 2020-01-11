
<?php

    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $select_post_byId = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_post_byId)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    }

    if (isset($_POST['update_post'])) {

        // echo "hi!";
        
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        move_uploaded_file($post_image_temp,"../images/$post_image");

        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = '{$post_id}', ";

        $update_post = mysqli_query($connection, $query);

        // confirm($update_post);
    }

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="title" class="form-control">
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
                
    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" name="author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo $post_title; ?></textarea> 
        
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Edit Post" name="edit_post"> 
    </div>

</form>