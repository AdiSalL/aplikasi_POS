<script>
      let counter = 1;
      $(document).ready(function() {
        $(".add_item_btn").click(function(e){
          $("#list_select_product").prepend(`<div class="row" id="row_select_product">
                              <div class="col w-100">
                                <label for="products_name" class="form-label">Products
                                  <?php 
                                      $sql = "SELECT * FROM barang";
                                      $stmt = $pdo->query($sql);
                                      $rows = $stmt->fetchAll();
                                    ?>
                                  <select class='form-select' name='products_name[]' id='${counter++}' onchange="choose_product(this)" required>
                                        <option></option>
                                        <?php foreach($rows as $row): ?>
                                          <option value='<?=$row['id_barang']?>' data-price="<?= $row['harga_barang'] ?> "><?= $row['nama_barang'] ?></option>
                                        <?php endforeach;?>
                                      
                                  </select>
                                </label>
                              </div>
                              <div class="col">
                                  <div>Harga</div>
                                  <div class="dispay_harga"></div> 
                                  <input type="hidden" name="products_price[]">
                              </div>
                              <div class="col">
                                <label for="products_quantity" class="form-label">Products quantity</label>
                                <input type="number" class="form-control" id="products_quantity" name="products_quantity[]" min="1" required>
                              </div>
                             
                         
                            <div class="mt-3 d-flex gap-1 justify-content-between items-center">
                              <a href="#" class="btn btn-danger w-100 rmv_item_btn">Remove Products</a>
                            </div>
                            </div> `)
        })
        
        $(document).on("click", ".rmv_item_btn", function(e){
          let row_item = $(this).parent().parent();
          $(row_item).remove();
        })


    })
      function choose_product(e) {
        console.log(e)
        let value = e.value;
        let text = e.options[e.selectedIndex].getAttribute('data-price');
        let parent = (e.parentNode.parentNode.parentNode.getElementsByClassName('dispay_harga').item(0).innerText = text)
        parent = (e.parentNode.parentNode.parentNode.getElementsByTagName('input').item(0).value = text)
      
      }

      function checkDuplicates(e) {
        let selectProducts = document.querySelectorAll("#list_select_product select");
        let selectedOptions = [];

        selectProducts.forEach(select => {
          let selectedOption = select.value;

          if (selectedOptions.includes(selectedOption)) {
            e.preventDefault();
            // alert("Cannot have the same value in multiple selects");
            let alert = document.getElementById("alert");
            alert.classList.remove("d-none")
            return;
        }
        
        selectedOptions.push(selectedOption);
        })
      }
      let form = document.getElementById("addPenjualanForm");
      form.addEventListener("submit", checkDuplicates);


    </script>