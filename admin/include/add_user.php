<?php
if (isset($_POST['create_user'])) {
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

    $create_user_query = mysqli_query($connection,$query);

    confirm($create_user_query);
}

?>
<form action="" method="user" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_status">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
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
        <input type="text" name="usename" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_content">Email</label>
        <input type="email" name="email" class="form-control"> 
    </div>

    <div class="form-group">
        <label for="user_content">Password</label>
        <input type="password" name="password" class="form-control"> 
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Publish User" name="create_user"> 
    </div>

</form>