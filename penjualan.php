<?php
include "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}

include "Components/BS/Sidebar.php";
include "Assets/CDN/script.php";
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between">
      <h1>Sales</h1>
      <a href="addPenjualan.php" class="btn mb-3 me-3 ">
      <button class="btn btn-bd-primary px-3 d-flex align-items-center font-large fs-4"
              id="bd-theme"
              type="button"
              aria-expanded="false">
              +
      </button>
    </a>
      </div>
      <?php 
    $sql = "SELECT penjualan.id_penjualan, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, tanggal FROM `penjualan` JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
    ?>
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No. Sales</th>
      <th scope="col">No. Customers</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <tbody>
    <tr>
      <th scope="row"><?= $row["id_penjualan"]?></th>
      <th scope="row"><?= $row["id_pelanggan"]?></th>
      <td><?= $row["nama_pelanggan"]?></td>
      <td><?= $row["tanggal"]?></td>
      <td><!-- Button trigger modal -->
      <div class="d-flex d-md-flex d-md-flex-column text-white  gap-2">
      <div>
      <a href="detailSales.php?id=<?php echo $row['id_penjualan'] ?>&nama=<?= $row["nama_pelanggan"]?>&tanggal=<?= $row["tanggal"]?>"  class="btn btn-primary" >
      <span class="d-none d-md-block">More Details</span>
        <span class="d-block d-md-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
  <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
</svg>
        </span>
</a>
      </div>
      <div>
      <a href="deleteSales.php?id=<?php echo $row['id_penjualan'] ?>" onclick="return confirm('Want to delete this sales ?')" class="btn btn-danger" >
        <span class="d-none d-md-block">Delete Sales</span>
        <span class="d-block d-md-none">x</span>
      </a>
        </div>
        <div>
      <a href="updateSales.php?id=<?php echo $row['id_penjualan'] ?>"  class="btn btn-warning " >
        <span class="d-none d-md-block">Update Customers</span>
        <span class="d-block d-md-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg>
        </span>
      </a>
        </div>
      </div>
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
