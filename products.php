<?php
include_once "./conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}

$perPage = 4;
$stmt_pag = $pdo->query("SELECT COUNT(*) FROM barang");
$total_results =$stmt_pag->fetchColumn();
$total_pages = ceil($total_results / $perPage);

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$starting_limit = ($page - 1) * $perPage;

$query = "SELECT * FROM barang ORDER BY id_barang ASC LIMIT :starting_limit, :perPage";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':starting_limit', $starting_limit, PDO::PARAM_INT);
$stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll();


include "Components/BS/Sidebar.php";
include "Assets/CDN/script.php";
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between">
      <h1>Products</h1>
      <a href="addProducts.php" class="btn mb-3 me-3 ">
      <button class="btn btn-bd-primary px-3 d-flex align-items-center font-large fs-4"
              id="bd-theme"
              type="button"
              aria-expanded="false">
              +
      </button>
    </a>
      </div>
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Gambar Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Barang</th>
      <th scope="col">Stok Barang</th>
      <th></th>
    </tr>
  </thead>
    <?php if($products):?>
      <?php foreach($products as $key => $row):?> 
  <tbody>
    <tr>
      <th scope="row"><?php echo $row["id_barang"]?></th>
      <td>
        <div class="" style="width: 200px; ">
          <img src="<?= $row["img_products"]?>" alt="img_products" class="img-fluid">
        </div>
      </td>
      <td><?php echo $row["nama_barang"]?></td>
      <td><?php echo $row["harga_barang"]?></td>
      <td><?php echo $row["stok_barang"]?></td>
      <td class="">
        <a href="updateProducts.php?id=<?php echo $row["id_barang"]?>" class="btn p-2 btn-primary btn-sm">Update</a>
        <a href="deleteProducts.php?id=<?php echo $row["id_barang"]?>" class="btn p-2 btn-danger btn-sm" onclick="return confirm('delete data ?')">Delete</a>
      </td>
    </tr>
  </tbody>
      <?php endforeach?> 
      
      <nav aria-label="...">
  <ul class="pagination pagination-md justify-content-center">
  <?php for ($page = 1; $page <= $total_pages ; $page++):?>
    <li class="page-item ">
      <a href='<?php echo "?page=$page"; ?>' class="page-link">
            <?php  echo $page; ?>
      </a>
    </li>
    <?php endfor; ?>  
  </ul>
</nav>

    <?php endif?>
</table>
    </main>
  </div>
</div>
<script src="bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
