<?php include "include/admin_header.php" ?>
<!-- <?php include "include/db.php" ?> -->

<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_profile_query  = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                // $user_image = $row['user_image'];
                $user_role = $row['user_role'];
    }
    
}

?>

<?php
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

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}' ";

        $edit_user_query = mysqli_query($connection, $query);

       confirm($edit_user_query);

}

?>

<html>
<body>

    <div id="wrapper">

        <?php include "include/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to User
                            <small>Author</small>
                        </h1>

                        <form action="users.php" method="post" enctype="multipart/form-data">

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
                                    <option value="subscriber"><?php echo $user_role ?></option>

                                    <?php
                                    
                                    if ($user_role == 'admin') {
                                        echo "<option value='subscriber'>Subscriber</option>";  
                                    } else {
                                        echo "<option value='admin'>Admin</option>";
                                    }
                                    
                                    ?>
                                    
                                    
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
                                <input class="btn btn-primary" type="submit" value="Update Profile" name="edit_user"> 
                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>