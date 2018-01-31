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
                <h1>Items in Shopping List</h1>
                <br>
                <div class="list-group">
                  <?php foreach ($shopping_list_items as $item) : ?>
                  <a href="#" class="list-group-item">
                  <?php echo $item['name'] . ' - ' . $item['shopping_list_quantity']; ?>
                  </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <form action="." method="post">
                  <input type="hidden" name="action" value="what_is_this">
                  <input type="submit" value="Back" class="btn btn-primary" id="full-length">
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
