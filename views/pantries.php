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

                <h1 class="text-center">My Pantries</h1>
                <br>
                <div class="list-group">
                  <?php foreach ($pantries as $pantry) : ?>
                  <a href="?action=items&pantry_id=<?php echo $pantry['id']; ?>&pantry_name=<?php echo $pantry['name']; ?>" class="list-group-item">
                  <?php echo $pantry['name']; ?>
                  </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <br><br>
            <div class="row">
              <div class="col-sm-12">
                <form action="." method="post">
                  <input type="hidden" name="action" value="add_pantry">
                  <input type="text" class="form-control" name="name" placeholder="New Pantry">
                  <br>
                  <input type="submit" value="Add Pantry" class="btn btn-primary" id="full-length">
                  <br>
                </form>
              </div>
              <br><br>
              <div class="col-sm-12">
                <form action="." method="post">
                  <input type="hidden" name="action" value="shopping_list">
                  <input type="hidden" name="pantry_id" value="<?php echo $pantry['id']; ?>">
                  <br>
                  <input type="submit" value="Shopping List" class="btn btn-primary" id="full-length">
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
