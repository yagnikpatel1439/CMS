<div class="col-md-4">
    
    <!-- Blog Search Well -->
    <div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="query" placeholder="Type text to search">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit" value="search">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
    </div>

    <div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="username" placeholder="Enter Username">
        
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Enter Password">
    </div>

    <span class="form-group-btn">
            <button name="login" class="btn btn-default" type="submit" value="login">Submit
            </button>
    </span>
    </form>
    <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
    
    <?php

        $query = "SELECT * FROM categories";
        $query_selection = mysqli_query($connection, $query);

    ?>

    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php

                    while ($row = mysqli_fetch_assoc($query_selection)) {
                        $title = $row['title'];
                        $id = $row['id'];
                        echo "<a href='category.php?category=$id'><li>{$title}</li></a>";
                    }

                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>