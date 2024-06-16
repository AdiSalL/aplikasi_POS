

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between">
      <h1>Sales</h1>
      <a href="addPembelian.php" class="btn mb-3 me-3 ">
      <button class="btn btn-bd-primary px-3 d-flex align-items-center font-large fs-4"
              id="bd-theme"
              type="button"
              aria-expanded="false">
              +
      </button>
    </a>
      </div>
      <?php 
    // $sql = "SELECT id_penjualan, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, tanggal FROM `penjualan` JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan ";
    $sql = "SELECT pembelian.id_pembelian, supplier.id_supplier, supplier.nama_supplier, pembelian.tanggal  FROM pembelian JOIN supplier ON supplier.id_supplier=pembelian.id_supplier";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
    ?>
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No. Buy</th>
      <th scope="col">No. Supplier</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <tbody>
    <tr>
      <th scope="row"><?= $row["id_pembelian"]?></th>
      <th scope="row"><?= $row["id_supplier"]?></th>
      <td><?= $row["nama_supplier"]?></td>
      <td><?= $row["tanggal"]?></td>
      <td><!-- Button trigger modal -->
<a href="detailPembelian.php?id=<?php echo $row['id_supplier'] ?>"  class="btn btn-primary" >
    See More Details
</a>
    </tr>
  </tbody>
  <?php endforeach ?>
</table>
    </main>
  </div>
</div>
<script src="bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
