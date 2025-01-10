<div class="container">
    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Gallery
    </button>
    <div class="row">
        <div class="table-responsive" id="gallery_foto">
           
        </div>
        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi</label>
                                <textarea class="form-control" name="isi" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
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
    </div>
</div>

<script>
$(document).ready(function(){
    load_data();
    function load_data(hlm){
        $.ajax({
            url : "gallery_foto.php",
            method : "POST",
            data : {
		    hlm: hlm
				           },
            success : function(data){
                    $('#gallery_foto').html(data);
            }
        })
    } 
    $(document).on('click', '.halaman', function(){
    var hlm = $(this).attr("id");
    load_data(hlm);
});
});
</script>

<?php
include "upload_foto.php";

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES['gambar']);

        if ($cek_upload['status']) {
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>alert('{$cek_upload['message']}');document.location='admin.php?page=gallery';</script>";
            die;
        }
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            $gambar = $_POST['gambar_lama'];
        } else {
            unlink("img/" . $_POST['gambar_lama']);
        }

        $stmt = $conn->prepare("UPDATE galery SET judul = ?, isi = ?, foto = ?, tanggal = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $judul, $isi, $gambar, $tanggal, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO galery (judul, isi, foto, tanggal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $judul, $isi, $gambar, $tanggal);
    }

    $simpan = $stmt->execute();

    if ($simpan) {
        echo "<script>alert('Simpan data sukses');document.location='admin.php?page=gallery';</script>";
    } else {
        echo "<script>alert('Simpan data gagal');document.location='admin.php?page=gallery';</script>";
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['foto'];

    if ($gambar != '') {
        unlink("img/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM galery WHERE id = ?");
    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>alert('Hapus data sukses');document.location='admin.php?page=gallery';</script>";
    } else {
        echo "<script>alert('Hapus data gagal');document.location='admin.php?page=gallery';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
