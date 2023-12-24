<!-- Footer -->
<?php include "../header.php" ?>

<h1 class="text-center">Survei Details</h1>
<div class="container">
    <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
    <tr>
        <th scope="col">ID Survei</th>
        <th scope="col" colspan="1"class="text-center">Icon</th>
        <th scope="col">Judul</th>
        <th scope="col">Link</th>
        <th scope="col" colspan="3" class="text-center">Action</th>
        </tr>
</thead>
<tbody>
    <tr>
        <?php
        // first we check using 'isset() function if the variable is set or not'
        //Processing form data when form is submitted
        if (isset($_GET['survei_id'])){
            $surveiid = $_GET['survei_id'];
            // SQL query to fetch the data where  id=$userid & storing data in view_user
            $query = "SELECT * FROM survei WHERE id_survei = {$surveiid}";
            $view_survei = mysqli_query($conn, $query);
            
            while ($row = mysqli_fetch_assoc($view_survei)){
                $id = $row['id_survei'];
                $icon = $row['icon'];
                $judul = $row['judul'];
                $link = $row['link'];
               

                echo "<tr >";
                echo " <td >{$id}</td>";
                echo " <td > <img src='images/".$icon."' width='100' height='100'> {$icon}</td>";
                echo " <td > {$judul}</td>";
                echo " <td > {$link}</td>";
                echo " </tr> ";


            }

        }

        ?>
    </tr>
</tbody>
</table>
</div>

<!-- a BACK Button to go to pervious page -->
<div class="container text-center mt-5">
<a href="home.php" class="btn btn-warning mt-5"> Back 
</a>
<div>
<!-- Footer -->
<?php include "../footer.php" ?>
