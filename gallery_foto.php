<table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul</th>
                        <th class="w-75">Isi</th>
                        <th class="w-25">Gambar</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";

                    $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
                    $limit = 3;
                    $limit_start = ($hlm - 1) * $limit;
                    $no = $limit_start + 1;

                    $sql = "SELECT * FROM galery ORDER BY tanggal DESC LIMIT $limit_start, $limit";
                    $hasil = $conn->query($sql);

                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <strong><?= $row["judul"] ?></strong><br>pada : <?= $row["tanggal"] ?>
                            </td>
                            <td><?= $row["isi"] ?></td>
                            <td>
                                <?php if ($row["foto"] != '' && file_exists('img/' . $row["foto"])) { ?>
                                    <img src="img/<?= $row["foto"] ?>" width="100">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>">
                                    <i class="bi bi-x-circle"></i>
                                </a>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Gallery</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label">Judul</label>
                                                        <input type="text" class="form-control" name="judul" value="<?= $row["judul"] ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Isi</label>
                                                        <textarea class="form-control" name="isi" required><?= $row["isi"] ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Ganti Gambar</label>
                                                        <input type="file" class="form-control" name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Gambar Lama</label>
                                                        <?php if ($row["foto"] != '' && file_exists('img/' . $row["foto"])) { ?>
                                                            <br><img src="img/<?= $row["foto"] ?>" width="100">
                                                        <?php } ?>
                                                        <input type="hidden" name="gambar_lama" value="<?= $row["foto"] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus Artikel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" action="">
                                                <div class="modal-body">
                                                    <p>Yakin akan menghapus artikel "<strong><?= $row["judul"] ?></strong>"?</p>
                                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                    <input type="hidden" name="foto" value="<?= $row["foto"] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php 
                } ?>
                </tbody>
            </table>

<?php 
$sql1 = "SELECT * FROM galery";
$hasil1 = $conn->query($sql1); 
$total_records = $hasil1->num_rows;
?>
<p>Total gallery : <?php echo $total_records; ?></p>
<nav class="mb-2">
    <ul class="pagination justify-content-end">
    <?php
        $jumlah_page = ceil($total_records / $limit);
        $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
        $start_number = ($hlm > $jumlah_number)? $hlm - $jumlah_number : 1;
        $end_number = ($hlm < ($jumlah_page - $jumlah_number))? $hlm + $jumlah_number : $jumlah_page;

        if($hlm == 1){
            echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
        } else {
            $link_prev = ($hlm > 1)? $hlm - 1 : 1;
            echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
            echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for($i = $start_number; $i <= $end_number; $i++){
            $link_active = ($hlm == $i)? ' active' : '';
            echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
        }

        if($hlm == $jumlah_page){
            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
        } else {
        $link_next = ($hlm < $jumlah_page)? $hlm + 1 : $jumlah_page;
            echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
        }
    ?>
    </ul>
</nav>            