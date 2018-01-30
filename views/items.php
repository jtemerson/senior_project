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
                <h1>Items in <?php echo $pantry_name; ?></h1>

                <div class="list-group">
                  <?php foreach ($items as $item) : ?>
                  <a href="#" class="list-group-item">
                  <?php echo $itme['name']; ?>
                  </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <form action="." method="post">
                  <input type="hidden" name="action" value="add_item_page">
                  <input type="hidden" name="pantry_id" value="<?php $pantry_id ?>">
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
