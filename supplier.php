<?php
include_once "./conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}


include_once "./Components/BS/Sidebar.php";
include "./Assets/CDN/script.php";
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between">
      <h1>Supplier</h1>
      <a href="addSupplier.php" class="btn mb-3 me-3 ">
      <button class="btn btn-bd-primary px-3 d-flex align-items-center font-large fs-4"
              id="bd-theme"
              type="button"
              aria-expanded="false">
              +
      </button>
    </a>
      </div>

      <?php
        $sql = "SELECT * FROM supplier";
        $stmt = $pdo->query($sql);

        $rows = $stmt->fetchAll();
      ?>
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Supplier</th>
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
      <th scope="row"><?php echo $row["id_supplier"]?></th>
      <td><?php echo $row["nama_supplier"]?></td>
      <td><?php echo $row["no_handphone"]?></td>
      <td><?php echo $row["alamat"]?></td>
      <td class="">
        <a href="deleteSupplier.php?id=<?php echo $row["id_supplier"]?>" class="btn p-2 btn-danger btn-sm" onclick="return confirm('delete data ?')">Delete</a>
      </td>
      <td>
      <a href="updateSupplier.php?id=<?php echo $row["id_supplier"]?>" class="btn p-2 btn-primary btn-sm">Update</a>
      
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
