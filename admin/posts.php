<?php include "include/admin_header.php" ?>

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
                            Welcome to Post
                            <small>Author</small>
                        </h1>

                        <?php

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];

                        }else {
                            $source = '';
                        }
                        switch ($source) {
                            case 'add_post':
                                include "include/add_post.php";
                                break;
                            case '2':
                                echo "Hey 2";
                                break;
                            case '3':
                                echo "Hey 3";
                                break;
                            
                            default:
                                include "include/view_all_posts.php";
                                break;
                        }
                        ?>

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