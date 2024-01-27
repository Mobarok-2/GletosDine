<?php require "../../config/config.php"?>
<?php require "../../libs/App.php"?>
<?php include "../layouts/header.php"?>
<?php

$query = "SELECT * FROM foods";
$app = new App;
$app->validateSessionAdminInside();
$foods = $app->selectAll($query);
?>
   

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="create-foods.php" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($foods as $food) : ?>
                  <tr>
                    <th scope="row"><?php echo $food->id; ?></th>
                    <td><?php echo $food->name; ?></td>
                    <td><img style="width: 50px; height:50px" src="../../../img/<?php echo $food->image; ?>"> </td>
                    <td><span style="font-size: 20px;"> ৳ </span><?php echo $food->price; ?></td>
                     <td><a href="delete-food.php?id=<?php echo $food->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


  <?php include "../layouts/footer.php"?>