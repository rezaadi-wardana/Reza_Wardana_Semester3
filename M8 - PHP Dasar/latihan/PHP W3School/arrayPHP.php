<!DOCTYPE html>
<html>
    <head>
        <title>Array PHP</title>
    </head>
    <body>
    <?php

    // membuat array kosong
    $kota = array();
    $desa = [];

    // membuat array sekaligus mengisinya
    $es = array("Sirup", "Teh", "Jus Jeruk");
    $makan = ["Nasi Goreng", "Soto", "Bubur"];
    $anggota[1] = "Reza";
    $anggota[2] = "Adi";
    $anggota[0] = "Wardana";

    //Menampilkan isinya
    echo $anggota[1];
    echo $makan;
    for($i=0; $i < count($es); $i++){
        echo $es[$i]."<br>";
    }
    // membuat array
    $hewan = [
        "Burung",
        "Kucing",
        "Ikan"
    ];

    // menghapus kucing
    unset($hewan[1]);

    echo $hewan[0]."<br>";
    echo $hewan[1]."<br>";
    echo $hewan[2]."<br>";

    echo "<hr>";

    echo "<pre>";
    print_r($hewan);
    echo "</pre>";

    //array 2 dimensi
    // membuat array 2 dimensi yang berisi array asosiatif
$artikel = [
    [
        "judul" => "Belajar PHP & MySQL untuk Pemula",
        "penulis" => "petanikode"
    ],
    [
        "judul" => "Tutorial PHP dari Nol hingga Mahir",
        "penulis" => "petanikode"
    ],
    [
        "judul" => "Membuat Aplikasi Web dengan PHP",
        "penulis" => "petanikode"
    ]
];

// menampilkan array
foreach($artikel as $post){
    echo "<h2>".$post["judul"]."</h2>";
    echo "<p>".$post["penulis"]."<p>";
    echo "<hr>";
}

?>
    </body>
</html>