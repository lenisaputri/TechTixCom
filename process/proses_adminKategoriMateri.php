<?php
    include "../config/connection.php";

    function tampilKategoriMateri($con)
    {
        $tampilKategoriMateri="select * from tabel_kategori_materi";
        $resultTampilKategoriMateri=mysqli_query($con, $tampilKategoriMateri);
        return $resultTampilKategoriMateri;
    }

    if(isset($_POST["tambahKategoriMateri"]) || isset($_POST["editKategoriMateriProses"]) || isset($_POST["hapusKategoriMateri"])){
        if($_GET["module"]=="kategoriMateri" && $_GET["act"]=="tambah"){
            $KategoriMateriQuery= "INSERT INTO tabel_kategori_materi (kategori_materi) VALUES ('$_POST[kategori_materi]')";
            mysqli_query($con, $KategoriMateriQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        } 
        else if($_GET["module"]=="kategoriMateri" && $_GET["act"]=="edit"){
            session_start();

            $EditKategoriMateriQuery= "UPDATE tabel_kategori_materi SET kategori_materi=('$_POST[kategori_materi]') WHERE id_kategori_materi = ('$_POST[id_kategori_materi]')";
            mysqli_query($con, $EditKategoriMateriQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else if($_GET["module"]=="kategoriMateri" && $_GET["act"]=="hapus"){
        $HapusKategoriMateriQuery="DELETE FROM tabel_kategori_materi WHERE id_kategori_materi='$_POST[id_kategori_materi]'";
        mysqli_query($con, $HapusKategoriMateriQuery);
        header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editKategoriMateri"])){
        session_start();
        $id_kategori_materi = $_POST['editKategoriMateri'];

        $editKategoriMateri="SELECT * FROM tabel_kategori_materi WHERE id_kategori_materi='$id_kategori_materi'";

        $resultEditKategoriMateri = mysqli_query($con, $editKategoriMateri);
        
        if(mysqli_num_rows($resultEditKategoriMateri) > 0){
            $i = 1;
            while($rowEditKategoriMateri=mysqli_fetch_assoc($resultEditKategoriMateri)){
            ?> 
            <form action="../process/proses_adminKategoriMateri.php?module=kategoriMateri&act=edit" method="POST">
                <input type="hidden" name="id_kategori_materi" value="<?=$rowEditKategoriMateri["id_kategori_materi"]?>">
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategori_materi" style="font-weight: bold">KATEGORI MATERI</label>
                        <input type="text" name="kategori_materi" id="kategori_materi2" class="form-control" value="<?=$rowEditKategoriMateri["kategori_materi"]?>" required>
                    </div>
                    <div class="col-sm-12">
                        <div id="kategori_materi2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <?php
                $i++;
            }
        }
                ?>
                <div class="modal-footer border-0">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button class="btn btn-primary" name="editKategoriMateriProses" type="submit" onclick="ValidasiEditKategoriMateri();"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        <?php
    }
?>