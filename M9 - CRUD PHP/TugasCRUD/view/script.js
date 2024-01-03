// Ambil elemen-elemen yang dibutuhkan
var openModalBtn = document.getElementById("openModalBtn");
var closeModalBtn = document.getElementById("closeModalBtn");
var modal = document.getElementById("myModal");

// Tampilkan modal saat tombol dibuka
openModalBtn.onclick = function() {
    modal.style.display = "block";
}

// Sembunyikan modal saat tombol ditutup atau di luar area modal
closeModalBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



