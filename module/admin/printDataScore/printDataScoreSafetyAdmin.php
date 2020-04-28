<?php
  include "../config/connection.php";
?>
<body>
    <div class="container-fluid" id="dataScore">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="index.php?module=dataScoreSafety" >
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Nilai Safety Online</span>
                    </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Print Data Nilai Safety Online</span>
                </li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Nilai Safety Detail Online</h6>
            </div>
            <div class="card-body">
            <form method="GET" >
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                $query = " SELECT tssd.*, tss.*, YEAR(tss.tanggal_training) AS tahun,tp.id_operator, tp.nik 
                FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
                WHERE tss.id_operator = tp.id_operator
                AND tssd.id_score_safety = tss.id_score_safety
                GROUP BY YEAR(tss.tanggal_training)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query

                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit">Tampilkan</button>
        <a href="index.php">Reset Filter</a>
    </form>
    <hr />
                <div class="table-responsive">
                <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        
        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
            echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
            FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
            WHERE tss.id_operator = tp.id_operator
            AND tssd.id_score_safety = tss.id_score_safety
            AND DATE(tss.tanggal_training)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
            FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
            WHERE tss.id_operator = tp.id_operator
            AND tssd.id_score_safety = tss.id_score_safety
            AND MONTH(tss.tanggal_training)='".$_GET['bulan']."' AND YEAR(tss.tanggal_training)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
            FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
            WHERE tss.id_operator = tp.id_operator
            AND tssd.id_score_safety = tss.id_score_safety
            AND YEAR(tss.tanggal_training)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }
    else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data Transaksi</b><br /><br />';
        echo '<a href="print.php">Cetak PDF</a><br /><br />';

        $query = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
        FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
        WHERE tss.id_operator = tp.id_operator
        AND tssd.id_score_safety = tss.id_score_safety ORDER BY tss.tanggal_training"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }

    ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>SMK3</th>
                                <th>EA-Hira</th>
                                <th>Movement Forklift</th>
                                <th>Confined Space</th>
                                <th>Loto</th>
                                <th>APD</th>
                                <th>BBS</th>
                                <th>Fire Fighting</th>
                                <th>WAH</th>
                                <th>Environment</th>
                                <th>P3K</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
                                // $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                $index = 1;

                                if(mysqli_num_rows($sql) > 0){
                                    while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr class="text-center" id-score-safety-detail="<?php echo $data["id_score_safety_detail"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td><?php echo $data["tanggal_training"]; ?></td>
                                                <td><?php echo $data["nik"]; ?></td>
                                                <td><?php echo $data["smk3"]; ?></td>
                                                <td><?php echo $data["ea_hira"]; ?></td>
                                                <td><?php echo $data["movement_forklift"]; ?></td>
                                                <td><?php echo $data["confined_space"]; ?></td>
                                                <td><?php echo $data["loto"]; ?></td>
                                                <td><?php echo $data["apd"]; ?></td>
                                                <td><?php echo $data["bbs"]; ?></td>
                                                <td><?php echo $data["fire_fighting"]; ?></td>
                                                <td><?php echo $data["wah"]; ?></td>
                                                <td><?php echo $data["environment"]; ?></td>
                                                <td><?php echo $data["p3k"]; ?></td>
                                            </tr>
                                        <?php 
                                        $index++;
                                    }
                                    ?>
                                    <?php
                                }   
                                else{
                                    ?>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</body>