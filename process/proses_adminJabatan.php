<?php
include "../config/connection.php";

function tampilJabatan($con)
{
    $tampilJabatan="select * from tabel_jabatan";
    $resultTampilJabatan=mysqli_query($con, $tampilJabatan);
    return $resultTampilJabatan;
}

if(isset($_POST["tambahJabatan"]) || isset($_POST["editJabatanProses"]) || isset($_POST["hapusJabatan"])){

    if($_GET["module"]=="jabatan" && $_GET["act"]=="tambah"){
        $JabatanQuery= "INSERT INTO tabel_jabatan (nama) VALUES ('$_POST[nama]')";
        mysqli_query($con, $JabatanQuery);
        header('location:../module/index.php?module=' . $_GET["module"]);
    } 
    else if($_GET["module"]=="jabatan" && $_GET["act"]=="edit"){
        session_start();

        $EditJabatanQuery= "UPDATE tabel_jabatan SET nama=('$_POST[nama]') WHERE id_jabatan = ('$_POST[id_jabatan]')";
        mysqli_query($con, $EditJabatanQuery);
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
    else if($_GET["module"]=="jabatan" && $_GET["act"]=="hapus"){
      $HapusJabatanQuery="DELETE FROM tabel_jabatan WHERE id_jabatan='$_POST[id_jabatan]'";
      mysqli_query($con, $HapusJabatanQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

// Modal JABATAN EDIT
if(isset($_POST["editJabatan"]))
{
    session_start();
    $id_jabatan = $_POST['editJabatan'];

    $editJabatan="SELECT * FROM tabel_jabatan WHERE id_jabatan='$id_jabatan'";

    $resultEditJabatan = mysqli_query($con, $editJabatan);
    
    if(mysqli_num_rows($resultEditJabatan) > 0){
        $i = 1;
        while($rowEditJabatan=mysqli_fetch_assoc($resultEditJabatan)){
        ?> 
        <form action="../process/proses_adminJabatan.php?module=jabatan&act=edit" method="POST">
            <input type="hidden" name="id_jabatan" value="<?=$rowEditJabatan["id_jabatan"]?>">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                    <input type="text" name="nama" id="nama2" class="form-control" value="<?=$rowEditJabatan["nama"]?>" required>
                </div>
                <div class="col-sm-12">
                    <div id="nama2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                </div>
            </div>
        <?php
        $i++;
        }
    }
        ?>
            <div class="modal-footer border-0">
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                <button class="btn btn-primary" name="editDataMateriSafety" type="submit"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </form>
    <?php
}
    
?>