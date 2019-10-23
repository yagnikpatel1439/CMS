<?php include "include/admin_header.php" ?>

<body>

    <div id="wrapper">

        <?php include "include/admin_navigation.php" ?>

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
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Add Category</label>
                                    <input type="text" class= "name-control" name="title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" type="submit" value="submit">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">

                        <?php
                        
                        if(isset($_POST['submit'])) {
                            $title = $_POST['title'];

                            if ($title == "" || empty($title)) {
                                echo "You need to add category";
                            } else {
                                $query = "INSERT INTO categories(title) VALUE ('{$title}')";

                                $create_category = mysqli_query($connection,$query);

                                if (!$create_category) {
                                    die("QUERY FAILED!" . mysqli_error($connection));
                                }
                            }
                        }
                        
                        ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php // CATEGORY SELECTION QUERY
                                    $query = "SELECT * FROM categories";
                                    $select_categories = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    
                                    echo "<tr>";
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$title}</td>";
                                    echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
                                    echo "</tr>";
                                    }

                                    ?>

                                    <?php // DELETE CATEGORY 

                                    if (isset($_GET['delete'])) {
                                        $cat_id = $_GET['delete'];

                                        $query = "DELETE FROM categories WHERE id = {$cat_id} ";
                                        $delete_query = mysqli_query($connection,$query);
                                        header("Location: categories.php");
                                    }
                                    ?>
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
