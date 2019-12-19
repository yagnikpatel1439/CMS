<?php

if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
            $select_users_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users_query)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

            }
}
if (isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $user_date = date('d-m-y');
    // $user_comment_count = 4;

    // echo $user_status;
    // move_uploaded_file($user_image_temp, "../images/$user_image");

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES ({$user_firstname}, '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}')";

    $edit_user_query = mysqli_query($connection,$query);

    confirm($edit_user_query);
}

?>
<form action="" method="user" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" value="<?php echo $user_firstname ?>" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname ?>" name="user_lastname" class="form-control">
    </div>

    <div class="form-group">
        <select name="user_category" id="">
            <option value="subscriber">Select User</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

   

    <!-- <div class="form-group">
        <label for="user_image">user Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="user_tags">Username</label>
        <input type="text" value="<?php echo $username ?>" name="usename" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_content">Email</label>
        <input type="email" value="<?php echo $user_email ?>" name="email" class="form-control"> 
    </div>

    <div class="form-group">
        <label for="user_content">Password</label>
        <input type="password" value="<?php echo $user_password ?>" name="password" class="form-control"> 
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Publish User" name="edit_user"> 
    </div>

</form>