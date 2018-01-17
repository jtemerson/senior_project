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
                  <input type="text" name="username" value="" class="form-control" placeholder="Enter Username">
                  <br>
                  <input type="text" name="password" value="" class="form-control" placeholder="Enter Password">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12">
                  <input type="submit" name="" value="Login" class="btn btn-primary" id="full-length">
                </div>
                <div class="col-sm-12">
                  <input type="submit" name="" value="Register" class="btn btn-primary" id="full-length">
                </div>
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
