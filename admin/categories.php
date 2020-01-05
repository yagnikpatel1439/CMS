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
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-lg-6">
                            <form action="" method="post"> <!-- INSERT CATEGORY FORM -->
                                <div class="form-group">
                                    <label for="title">Add Category</label>
                                    <input type="text" class= "name-control" name="title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" type="submit" value="submit">
                                </div>
                            </form>

                            <form action="" method="post"> <!-- UPDATE CATEGORY FORM -->
                                <div class="form-group">
                                    <label for="title">Update Category</label>

                                    <?php 
                                    if (isset($_GET['edit'])) {
                                        $cat_id = $_GET['edit'];

                                        $query = "SELECT * FROM categories WHERE id = $cat_id";
                                        $select_categories_id = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                        $cat_id = $row['id'];
                                        $cat_title = $row['title'];
                                    
                                    ?>
                                    <input type="text" value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" name='title'> 
                                    <?php }} ?>

                                    <?php // UPDATE QUERY 
                                        if (isset($_POST['update'])) {
                                            $cat_title = $_POST['title'];
    
                                            $query = "UPDATE categories SET title = '$cat_title' WHERE id = {$cat_id} ";
                                            $update_query = mysqli_query($connection,$query);
                                            
                                            if (!$update_query) {
                                                die("QUERY FAILED" .mysql_error($connection));
                                            }
                                        }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" name="update" type="submit" value="update">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">

                        <?php // INSERT CATEGORY
                        
                        insertCategory();
                        
                        ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php // CATEGORY SELECTION QUERY
                                    
                                    findAllCategories();

                                    ?>

                                    <?php // DELETE CATEGORY 

                                    deleteCategory();

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