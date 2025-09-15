<!DOCTYPE html>
<html>

<head>
    <title>Laporan Hasil</title>
    <link href="<?= base_url('assets/css/custom-print.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="kop-surat">
        <img src="<?= base_url('assets/img/mapala.png'); ?>" alt="Logo Mapala">
        <div>
            <h2>MAPALA Universitas Andalas</h2>
            <p>Gedung PKM Universitas Andalas, Jl. Universitas Andalas II Sayap Kiri,<br>Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat</p>
        </div>
        <img src="<?= base_url('assets/img/Unand.png'); ?>" alt="Logo Unand">
    </div>
    <hr class="double-line">

    <div class="deskripsi">
        <p style="text-indent: 50px;">
            Berdasarkan hasil proses yang telah dilakukan melalui aplikasi Sistem Pendukung Keputusan dengan metode Multi Attribute Utility Theory (MAUT), diperoleh rekomendasi urutan toko penyewaan tenda camping terbaik di Padang. Proses penilaian dilakukan secara objektif berdasarkan kriteria yang telah ditentukan, sehingga menghasilkan rekomendasi yang dapat dijadikan acuan dalam memilih toko penyewaan tenda camping yang memenuhi kebutuhan terbaik. Adapun rekomendasikan urutan dari toko penyewaan tenda camping terbaik adalah sebagai berikut :
        </p>
    </div>

    <h3>Laporan Hasil Akhir</h3>
    <table>
        <thead>
            <tr>
                <th>Alternatif</th>
                <th>Nilai Preferensi</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($hasil as $keys): ?>
                <tr>
                    <td align="left">
                        <?php
                        $nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
                        echo $nama_alternatif['nama'];
                        ?>
                    </td>
                    <td><?= $keys->nilai ?></td>
                    <td><?= $no; ?></td>
                </tr>
            <?php
                $no++;
            endforeach ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>