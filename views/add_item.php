<!DOCTYPE html>
<html>
    <head>
      <?php include './modules/head.html'; ?>
    </head>
    <body>
        <header>
            <div>
              <?php include './modules/header.html'; ?>
            </div>
        </header>

        <nav>
            <div>
              <?php include './modules/nav.html'; ?>
            </div>
        </nav>

        <main class="container">
          <div class="row">
            <div class="col-sm-12">

              <?php
                if($message){
                    echo "<div class='row'>
                            <div class='col-sm-12'>
                              <div class='alert alert-success'>
                                <b>$message</b>
                              </div>
                            </div>
                          </div>";
                }
                if($error){
                  echo "<div class='row'>
                          <div class='col-sm-12'>
                            <div class='alert alert-danger'>
                              <b>$error</b>
                            </div>
                          </div>
                        </div>";
                }
              ?>


              <form action="." method="post">
                <input type="hidden" name="action" value="add_item">
                <br>
                <input type="hidden" name="pantry_id" value="<?php echo $pantry_id ?>">
                <input type="hidden" name="pantry_name" value="<?php echo $pantry_name ?>">
                <br>
                <input type="text" class="form-control" name="name" placeholder="Name">
                <br>
                <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                <br>
                <input type="text" class="form-control" name="brand" placeholder="Brand (optional)">
                <br>
                <input type="date" class="form-control" name="expiration" placeholder="Expiration (optional)">
                <br>
                <span>Add to Shopping List?</span>
                <select class="form-control" name="shopping_list">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                <br>
                <input type="text" class="form-control" name="shopping_list_quantity" placeholder="Shopping List Quantity (optional)">
                <br>
                <input type="submit" value="Add Item" class="btn btn-primary" id="full-length">
              </form>
            </div>
          </div>
        </main>

        <footer>
            <div>
              <?php include './modules/footer.html'; ?>
            </div>
        </footer>
    </body>
</html>
