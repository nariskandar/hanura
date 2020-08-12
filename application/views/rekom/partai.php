
<h1>Tabel Partai</h1>
<table id="partai" class="display table" style="width: 100%; cellspacing: 0;">

    <thead>
        <tr>
            <th>No</th>
            <th>id_partai</th>
            <th>logo_partai</th>
            <th>nama_partai</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php foreach ($partai as $par) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $par['id_partai']; ?></td>
            <td><?= $par['logo_partai']; ?></td>
            <td><?= $par['partai']; ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>