
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between">
      <h1>Customers</h1>
      <a href="addPelanggan.php" class="btn mb-3 me-3 ">
      <button class="btn btn-bd-primary px-3 d-flex align-items-center font-large fs-4"
              id="bd-theme"
              type="button"
              aria-expanded="false">
              +
      </button>
    </a>
      </div>

      <?php
      $perPage = 4;
      $stmt_pag = $pdo->query("SELECT COUNT(*) FROM pelanggan");
      $total_results =$stmt_pag->fetchColumn();
      $total_pages = ceil($total_results / $perPage);
      
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $starting_limit = ($page - 1) * $perPage;
      $sql = "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC LIMIT ?, ?";

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(1, $starting_limit, PDO::PARAM_INT);
      $stmt->bindParam(2, $perPage, PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetchAll();
    
      ?>
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
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Profile Pelanggan</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">No. HP</th>
      <th scope="col">Alamat</th>
      <th scope="col"></th>
      <th></th>
    </tr>
  </thead>
    <?php if($rows):?>
      <?php foreach($rows as $row):?>
        
  <tbody>
    <tr>
      <th scope="row"><?php echo $row["id_pelanggan"]?></th>
      <td><img src="<?php echo $row['img_cus']?>" width="100px" alt=""></td>
      <td><?php echo $row["nama_pelanggan"]?></td>
      <td><?php echo $row["no_handphone"]?></td>
      <td><?php echo $row["alamat"]?></td>
      <td class="">
      </td>
      <td>
      <a href="updatePelanggan.php?id=<?php echo $row["id_pelanggan"]?>" class="btn p-2 btn-primary btn-sm">Update</a>
      <a href="deletePelanggan.php?id=<?php echo $row["id_pelanggan"]?>" class="btn p-2 btn-danger btn-sm" onclick="return confirm('delete data ?')">Delete</a>
      </td>
    
    </tr>
  </tbody>
      <?php endforeach?>  
    <?php endif?>
</table>
    </main>
  </div>
</div>
<script src="bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
