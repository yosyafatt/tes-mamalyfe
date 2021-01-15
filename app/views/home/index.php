<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamalyfe.</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/7536e3d4dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>
    <header class="mt-4">
        <div class="container">
            <div class="col-4 px-0">
                <h4>Pendaftaran Interview Baru</h4>
                <h1 class="display-4">Mamalyfe.</h1>
            </div>
        </div>
    </header>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <a href="#" class="btn btn-primary tambahBtn" data-toggle="modal" data-target="#tambahModal"><i class="far fa-plus-square"></i> Tambah Data</a>
                    <a href="<?= BASEURL; ?>/home/printdata" class="btn btn-success printBtn"><i class="fas fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Posisi Yang Dipilih</th>
                                <th scope="col" class="tableAction">Actions</th>
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
                                    <td class="d-flex justify-content-around cellAction">
                                        <a href="#" class="btn btn-info btn-sm editBtn" data-toggle="modal" data-target="#tambahModal" data-id="<?= $user['id']; ?>" data-baseurl="<?= BASEURL; ?>"><i class="far fa-edit"></i> Edit</a>
                                        <a href="<?= BASEURL; ?>/home/hapusdata/<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Konfirmasi hapus data?');"><i class="far fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <!-- Tambah Data -->
    <div class="modal fade" tabindex="-1" id="tambahModal" aria-labelledby="tambahModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Interview Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/home/tambahdata" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="2"></textarea>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="mt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenisLaki" value="Laki-laki">
                                        <label class="form-check-label" for="jenisLaki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenisPerempuan" value="Perempuan">
                                        <label class="form-check-label" for="jenisPerempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="agama">Agama</label>
                                <select name="agama" class="form-control" id="agama">
                                    <option value="">Pilih: </option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaandipilih">Posisi Yang Diinginkan</label>
                            <input type="text" class="form-control" id="pekerjaandipilih" name="pekerjaandipilih">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?= BASEURL; ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>