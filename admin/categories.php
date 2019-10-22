<?php include "include/header.php" ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-lg-6">
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="title">Add Category</label>
                                    <input type="text" class= "name-control" name="title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="text" name="submit" type="submit" value="Add category">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Anything</td>
                                        <td>More than anything</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
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
