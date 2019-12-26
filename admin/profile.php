<?php include "include/admin_header.php" ?>

<?php

if (isset($_SESSION['username'])) {
    
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
                                <input class="btn btn-primary" type="submit" value="Update User" name="edit_user"> 
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