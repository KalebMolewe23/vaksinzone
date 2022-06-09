<section class="section-p1">
    <br>
    <center>
        <h4><strong>Informasi Data Vaksinasi Kecamatan Lowokwaru </strong></h4>
    </center><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Kelurahan</center>
            </th>
            <th>
                <center>Nama Puskesmas</center>
            </th>
            <th>
                <center>jumlah_penduduk</center>
            </th>
            <th>
                <center>Belum Vaksin G-1</center>
            </th>
            <th>
                <center>Belum Vaksin G-2</center>
            </th>
            <th>
                <center>Belum Vaksin G-3</center>
            </th>
            <th>
                <center>Status Zona</center>
            </th>
        </tr>

        <?php $no = 1;
        foreach ($lowokwaru as $inv) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $inv->nama_kelurahan ?></td>
                <td align="center"><?= $inv->nama_puskesmas ?></td>
                <td align="center"><?= $inv->jumlah_penduduk ?></td>
                <td align="center"><?= $inv->bvaksin_gel1 ?></td>
                <td align="center"><?= $inv->bvaksin_gel2 ?></td>
                <td align="center"><?= $inv->bvaksin_gel3 ?></td>
                <td align="center">Hijau</td>
            </tr>
        <?php endforeach; ?>
    </table><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Kelurahan</center>
            </th>
            <th>
                <center>Nama Puskesmas</center>
            </th>
            <th>
                <center>jumlah_penduduk</center>
            </th>
            <th>
                <center>Belum Vaksin G-1</center>
            </th>
            <th>
                <center>Belum Vaksin G-2</center>
            </th>
            <th>
                <center>Belum Vaksin G-3</center>
            </th>
            <th>
                <center>Status Zona</center>
            </th>
        </tr>

        <?php $no = 1;
        foreach ($lowokwaru1 as $inv1) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $inv1->nama_kelurahan ?></td>
                <td align="center"><?= $inv1->nama_puskesmas ?></td>
                <td align="center"><?= $inv1->jumlah_penduduk ?></td>
                <td align="center"><?= $inv1->bvaksin_gel1 ?></td>
                <td align="center"><?= $inv1->bvaksin_gel2 ?></td>
                <td align="center"><?= $inv1->bvaksin_gel3 ?></td>
                <td align="center">Kuning</td>
            </tr>
        <?php endforeach; ?>
    </table><br><br><br><br><br><br><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Kelurahan</center>
            </th>
            <th>
                <center>Nama Puskesmas</center>
            </th>
            <th>
                <center>jumlah_penduduk</center>
            </th>
            <th>
                <center>Belum Vaksin G-1</center>
            </th>
            <th>
                <center>Belum Vaksin G-2</center>
            </th>
            <th>
                <center>Belum Vaksin G-3</center>
            </th>
            <th>
                <center>Status Zona</center>
            </th>
        </tr>

        <?php $no = 1;
        foreach ($lowokwaru2 as $inv2) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $inv2->nama_kelurahan ?></td>
                <td align="center"><?= $inv2->nama_puskesmas ?></td>
                <td align="center"><?= $inv2->jumlah_penduduk ?></td>
                <td align="center"><?= $inv2->bvaksin_gel1 ?></td>
                <td align="center"><?= $inv2->bvaksin_gel2 ?></td>
                <td align="center"><?= $inv2->bvaksin_gel3 ?></td>
                <td align="center">Merah</td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<script type="text/javascript">
    window.print();
</script>