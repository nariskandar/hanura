
<h1>Tabel Kursi</h1>
<table id="kursi" class="display table" style="width: 100%; cellspacing: 0;">

    <thead>
        <tr>
            <th>No</th>
            <th>id</th>
            <th>geo_prov_id</th>
            <th>geo_kab_id</th>
            <th>partai</th>
            <th>total_kursi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php foreach ($kursi as $kur) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $kur['id']; ?></td>
            <td><?= $kur['geo_prov_id']; ?></td>
            <td><?= $kur['geo_kab_id']; ?></td>
            <td><?= $kur['partai']; ?></td>
            <td><?= $kur['total_kursi']; ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>