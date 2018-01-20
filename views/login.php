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

        <main>
            <div class="container">
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

                  <h1 class="text-center">Login or Register</h1>
                  <br>
                  <form class="" name="action" method="post">
                        <input type="text" name="name" value="" class="form-control" placeholder="Enter Name (ONLY FOR SIGN UP)">
                        <br>
                        <input type="text" name="email" value="" class="form-control" placeholder="Enter Email">
                        <br>
                        <input type="text" name="password" value="" class="form-control" placeholder="Enter Password">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-12">
                        <input type="submit" name="action" value="Login" class="btn btn-primary" id="full-length">
                      </div>
                      <br><br>
                      <div class="col-sm-12">
                        <input type="submit" name="action" value="Sign Up" class="btn btn-primary" id="full-length">
                      </div>
                    </div>
                  </form>
            </div>
        </main>

        <footer>
            <div>
              <?php include './modules/footer.html'; ?>
            </div>
        </footer>
    </body>
</html>
