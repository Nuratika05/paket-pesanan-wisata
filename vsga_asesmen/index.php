<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header class="text-center">
        <h1 class="text-center">Daftar Hadir</h1>
        <a href="create.php" class="btn btn-primary my-2">Tambah Data</a>
    </header>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include('db_asesmen.php');

            $sql= "SELECT * FROM Users";
            $result = $conn->query($sql);
            $no=1;

            foreach ($result as $row) {
                echo
                "<tr>
                    <td>" .$row['nama']."</td>
                    <td></td>
                </tr>"
            }
            ?>
        </tbody>
    </table>
</body>

</html>