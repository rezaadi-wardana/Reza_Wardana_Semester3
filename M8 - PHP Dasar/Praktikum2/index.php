<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <style>
        input{
            width: 100%;
        }
        #gender {
            display: flex;
            height: 20px;
            margin: 5px 0;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">PHP Form Validation Example</h1>
    <form action="proses.php" name="form" method="post"style="display:grid; justify-content:center;" >
        <label for="nama" >Nama :
            <input type="text" name="nama" placeholder="Masukkan nama" required>
        </label>
        <label for="email" >Email :
            <input type="email" name="email" placeholder="Masukkan Email" required>
        </label>
        <label for="web" >Website
            <input type="text" name="web" placeholder="Masukkan Link" required>
        </label>
        <label for="coment" >Comment :
            <input type="textarea" name="coment" placeholder="Masukkan Komentar" required>
        </label>
        <label for="gender" id="gender" >Gender :
            <input type="radio" name="gender" placeholder="Male" required>Male
            <input type="radio" name="gender" value="Female" required>Female
        </label>
        <button type="submit" name="submit" value=<?php echo date('h:i:sa');?>>Submit</button>
    </form>
</body>
</html>