<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/bootstrap/css/bootstrap.min.css">
    <style>
        @page {
            margin: 0;
        }
    </style>
</head>

<body>
    <header class="mt-4">
        <div class="container">
            <div class="px-0">
                <h4>Pendaftaran Interview Baru</h4>
                <h1>Mamalyfe.</h1>
            </div>
        </div>
    </header>
    <main class="mt-4">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Posisi Yang Dipilih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num = 1;
                    foreach ($data['user'] as $user) : ?>
                        <tr>
                            <th scope="row"><?= $num++; ?></th>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['alamat']; ?></td>
                            <td><?= $user['jenis_kelamin']; ?></td>
                            <td><?= $user['agama']; ?></td>
                            <td><?= $user['pekerjaandipilih']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </main>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <!-- <script src="<?= BASEURL; ?>/bootstrap/js/bootstrap.min.js"></script> -->
    <!-- <script src="<?= BASEURL; ?>/js/script.js"></script> -->
</body>

</html>