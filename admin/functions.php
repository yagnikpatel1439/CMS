<?php

function insertCategory() 
{
    global $connection;
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
}


function findAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
    $id = $row['id'];
    $title = $row['title'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$title}</td>";
    echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$id}'>Edit</a></td>";
    echo "</tr>";
    }

}

function deleteCategory()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE id = {$cat_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}
?>