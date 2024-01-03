<!-- header -->
<?php include "../header.php" ?>

<div class="container" class="p-3 mb-2 bg-dark text-white">
    <h1 class="text-center text-primary dt">DATA SURVEI</h1>
    <!-- <a href="create.php" class="btn  btn-outline-dark mb-2"><i class="bi bi-person-plus"></i>Create New Survei</a> -->
    <button id="openModalBtn"  class="btn  btn-outline-dark mb-2">Tambah Data</button>

    <table class="table table-striped table-bordered border-primary table-hover">
        <thead class="table-primary">
            <tr>
                <!-- <th scope="col">ID Survei</th> -->
                <th scope="col">Icon</th>
                <th scope="col">Judul</th>
                <th scope="col">Link</th>
                <th scope="col" colspan="3" class="text-center">Action</th>
            </tr>
        </thead>
   
    <tbody>
        <tr>
            <?php
            $query = "SELECT * FROM survei";//SQL query to fecth all  table daa
            $view_survei = mysqli_query($conn, $query); //sending the query to the database
             
            echo " <p>Show Entries <select name='show' id='show'>  
            <option value='10'>10</option>
            <option value='50'>50</option>
            </select></p>";

            //displaying all the data retrieved from the database using while lop
            while ($row = mysqli_fetch_assoc($view_survei)){
                $id = $row ['id_survei'];
                $icon = $row ['icon'];
                $judul = $row['judul'];
                $link = $row['link'];
       
                
                echo "<tr>";
                // echo "<th scope='row'> {$id}</th>";
                echo "<td ><img src='images/".$icon."' width='100' height='100'> </td>";
                echo "<td > {$judul}</td>";
                echo "<td > {$link}</td>";
                echo "<td class='text-center'> <a href='read.php?survei_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i>READ</a></td>";
                echo "<td class='text-center'> <a href='update.php?edit&survei_id={$id}' class='btn btn-secondary'> <i class='bi bi-pencil'></i>UPDATE</a></td>";
                // echo "<td class='text-center'> <a href='confirm.php?delete={$id}' class='btn btn-danger'><i class='bi bi-trash'></i>DELETE</a></td>";
                echo  "<td class='text-center '> <button id='deleteModal' class='text-light btn btn-danger btn-outline-dark mb-2'>DELETE</button></td>";

            }
            ?>
        </tr>
    </tbody>
    </table>
    
</div>



<div id="myModal" class="modal">
    <!-- Konten Modal -->
    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Tambah Data</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="icon" class="for-label">Icon</label>
                <input type="file" name="icon" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="judul" class="for-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="link" class="for-label">Link</label>
                <input type="text" name="link" class="form-control" required>
            </div>

        <div class="form-group">
        <input type="submit" name="create" class="btn 
        btn-primary mt-2" value="Submit">
        </div>

    </form>
    </div>
</div>


<!-- <div id="deleteModal" class="modal"> -->
    <!-- Konten Modal -->
    <div id="showDeleteModal" class="modal">
        <div class="modal-content  d-grid  text-center" id="modal-content">
            <h2>Konfirmasi Delete</h2>
            <img src="images/sampah.png" alt="">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <button class="btn text-light btn-success btn-outline-dark mb-2" onclick="confirmDelete()">Ya, Hapus</button>
            <button class="btn text-light btn-danger btn-outline-dark mb-2" onclick="noconfirmDelete()">Batal</button>
        </div>
    </div>
</div>
<?php
echo "<script>

var deleteModal = document.getElementById('deleteModal');
// var closeModal = document.getElementById('closeModal');
var showDeleteModal = document.getElementById('showDeleteModal')

// Fungsi untuk menampilkan modal konfirmasi delete
deleteModal.onclick = function() {
    showDeleteModal.style.display = 'block';
}

// closeModal.onclick = function() {
//     showDeleteModal.style.display = 'none';
// }
// window.onclick = function(event) {
//     if (event.target == showDeleteModal) {
//         showDeleteModal.style.display = 'none';
//     }  
// }

function confirmDelete() {  
    window.location.href = 'delete.php?delete={$id}';
}
function noconfirmDelete() {
    showDeleteModal.style.display = 'none';
}
window.onclick = function(event) {
    if (event.target == showDeleteModal) {
        showDeleteModal.style.display = 'none';
    }
}


</script>"
?>


<script src="script.js"></script>
