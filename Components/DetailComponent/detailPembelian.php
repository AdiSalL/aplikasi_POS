<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Barang Pcs.</th>
      <th scope="col">Stok Barang</th>
    </tr>
  </thead>
  <?php 
  $id = $_GET["id"];
  $sql = "SELECT barang.id_barang, nama_barang, barang.harga_barang, jumlah FROM pembelian_barang RIGHT JOIN  barang  ON pembelian_barang.id_barang=barang.id_barang JOIN pembelian ON pembelian.id_pembelian=pembelian_barang.id_pembelian WHERE pembelian.id_supplier  = $id";
  $stmt = $pdo->query($sql);

  $rows = $stmt->fetchAll();

  ?>
    <?php if($rows):?>
      <?php foreach($rows as $row):?>
        
  <tbody>
    <tr>
      <th scope="row"><?php echo $row["id_barang"]?></th>
      <td><?php echo $row["nama_barang"]?></td>
      <td><?php echo $row["harga_barang"]?></td>
      <td><?php echo $row["jumlah"]?></td>
    </tr>
  </tbody>
      <?php endforeach?>  
    <?php endif?>
</table>
    </main>
  </div>
</div>
</html>
