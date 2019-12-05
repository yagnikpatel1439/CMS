<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $user_post_id = $row['username'];
                $user_author = $row['user_password'];
                $user_content = $row['user_firstname'];
                $user_email = $row['user_lastname'];
                $user_status = $row['user_email'];
                $user_date = $row['user_image'];
                $user_date = $row['user_role'];

                
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_firstname</td>";
                
                // $query = "SELECT * FROM categories WHERE id = {$user_category_id}";
                
                // $select_categories_id = mysqli_query($connection, $query);
                
                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                //     $cat_id = $row['id'];
                //     $cat_author = $row['title'];

                //     echo "<td>$cat_title</td>";
                // }
                
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_role</td>";

                // $query = "SELECT * FROM posts WHERE post_id = $user_post_id";
                // $select_post_id_query = mysqli_query($connection, $query);
                // while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                //     $post_id = $row['post_id'];
                //     $post_title = $row['post_title'];

                //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                // }


                echo "<td>$user_date</td>";

               
                echo "<td><a href='users.php?approve={$user_id}'>Approve</a></td>";
                echo "<td><a href='users.php?unapprove={$user_id}'>Unapprove</a></td>";
                // echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Update</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }

            if (isset($_GET['approve'])) {
                $the_user_id = $_GET['approve'];

                $query = "UPDATE users SET user_status = 'approved' WHERE user_id = $the_user_id";
                $approve_query = mysqli_query($connection,$query);
                header("Location: users.php");
            }
            
            if (isset($_GET['unapprove'])) {
                $the_user_id = $_GET['unapprove'];

                $query = "UPDATE users SET user_status = 'unapproved' WHERE user_id = $the_user_id";
                $unapprove_query = mysqli_query($connection,$query);
                header("Location: users.php");
            }

            if (isset($_GET['delete'])) {
                $the_user_id = $_GET['delete'];

                $query = "DELETE FROM users WHERE user_id = $the_user_id";
                $delete_query = mysqli_query($connection,$query);
                header("Location: users.php");
            }
            
        ?>
    </tbody>
</table>