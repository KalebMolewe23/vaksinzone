<!-- MAIN -->
<section class="section-p1">

        <br>
        <center>
            <h4><strong>Informasi Vaksinasi Kecamatan Lowokwaru</strong></h4>
        </center><br>

        <table class="table table-bordered table_hover table-striped">
            <tr>
                <th>
                    <center>No.</center>
                </th>
                <th>
                    <center>Nama Puskesmas</center>
                </th>
                <th>
                    <center>Nama Kelurahan</center>
                </th>
                <th>
                    <center>Alamat</center>
                </th>
                <th>
                    <center>Kode Pos</center>
                </th>
            </tr>

            <?php $no = 1;
            foreach ($lowokwaru as $inv) : ?>
                <tr>
                    <td align="center"><?= $no++ ?></td>
                    <td align="center"><?= $inv->nama_puskesmas ?></td>
                    <td align="center"><?= $inv->nama_kelurahan ?></td>
                    <td align="center"><?= $inv->alamat ?></td>
                    <td align="center"><?= $inv->kode_pos ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
</section>

<script type="text/javascript">
    window.print();
</script>