<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Barang</th>
      <th scope="col">Jumlah Barang</th>
      <th></th>
    </tr>
  </thead>
  <?php 

  $sql = "SELECT pelanggan.nama_pelanggan, barang.id_barang, nama_barang, barang.harga_barang, jumlah, penjualan.tanggal, penjualan.id_penjualan FROM penjualan_barang RIGHT JOIN  barang  ON penjualan_barang.id_barang=barang.id_barang JOIN penjualan ON penjualan.id_penjualan=penjualan_barang.id_penjualan JOIN pelanggan ON pelanggan.id_pelanggan=penjualan.id_pelanggan WHERE penjualan.id_penjualan = " . $_GET['id'];

  $stmt = $pdo->query($sql);

  $rows = $stmt->fetchAll();

  
  ?>

<div class="d-flex justify-content-between">
<div class="card mb-3 mt-2" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <?php 
  $nama_pelanggan = $_GET['nama']; 
  $sql_img = "SELECT img_cus FROM pelanggan WHERE nama_pelanggan = :nama";
  $stmt_img = $pdo->prepare($sql_img);
  $stmt_img->bindParam(':nama', $nama_pelanggan, PDO::PARAM_STR);
  $stmt_img->execute();

  // $img = $stmt_img->fetch();
  $img = $stmt_img->fetchAll();

 
      ?>
    <?php foreach($img as $pfp):?>
    <img src="<?php echo $pfp['img_cus']?>" class="card-img" alt="...">
  <?php endforeach;?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Customer</h5>
        <p class="card-text"><?php echo $_GET["nama"]?></p>
        <p class="card-text"><small class="text-muted">Dimasukkan tanggal <?php echo $_GET["tanggal"]?></small></p>
      </div>
    </div>
  </div>
</div>
      <div class="mt-5">
        <div class="card">
        <?php 
          $sql_sum = "SELECT SUM(harga_barang) AS total_harga_barang FROM penjualan_barang";
          $sql_jum = "SELECT SUM(jumlah) AS total_jumlah_barang FROM penjualan_barang";

          $stmt_sum = $pdo->query($sql_sum);
          $stmt_jum = $pdo->query($sql_jum);
          $rows_sum = $stmt_sum->fetch(PDO::FETCH_ASSOC);
          $rows_jum = $stmt_jum->fetch(PDO::FETCH_ASSOC);
          
        ?>
        </div>
      </div>
</div>

  <tbody>
    <tr>
    <?php  foreach($rows as $row):?>  
  <th scope="row"><?php echo $row["id_barang"]?></th>
      <td><?php echo $row["nama_barang"]?></td>
      <td><?php echo $row["harga_barang"]?></td>
      <td><?php echo $row["jumlah"]?></td>
      <td>
     
        <div class="d-flex flex-column d-md-block gap-1">
          <a href="deleteDetails.php?id=<?= $_GET['id']?>&id_barang=<?= $row['id_barang']?>" onclick="return confirm('you want to delete the data ?')" class="btn btn-danger">
            <span  class="text-light d-none d-md-inline ">
              delete
            </span>
            <span class="d-md-none d-inline">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
            </span>
          </a>
          <a href="updateDetails.php?id=<?= $_GET['id']?>&id_barang=<?= $row['id_barang']?>" class="btn btn-warning">
            <span  class="text-light d-none d-md-inline ">
              update
            </span>
            <span class="d-md-none d-inline">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
            </span>
          </a>
          

        </div>
      </td>
    </tr>


    <?php endforeach?>
  </tbody>

</table>  
<div class="card-body">
          <?php 
                
                if($rows_sum) {
                  echo "<p>sales total: " . "Rp." . $rows_sum['total_harga_barang'] * $rows_jum["total_jumlah_barang"] ." </p>";
                }else {
                  echo "<p>No Data</p>";
                }
                  ?>
          </div>
    </main>

  </div>
</div>
</html>
