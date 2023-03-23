<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Lowowngan | <?= $title ?></title>
</head>
<body>
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pekerjaan</th>
                    <th scope="col">Deskripsi</th>     
                    <th scope="col">Lokasi</th>
                    <th scope="col">Gaji</th>
                </tr>
            </thead>
            <?php $no = 1 ; foreach($siswa as $ssw) :  ?>

            <tbody class="tbody-dark">
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $ssw->nama_pekerjaan ?></td>
                    <td><?= $ssw->deskripsi ?></td>
                    <td><?= $ssw->lokasi ?></td>
                    <td><?= $ssw->gaji ?></td>
                <tr>                      
            </tbody>
            <?php endforeach ?>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>