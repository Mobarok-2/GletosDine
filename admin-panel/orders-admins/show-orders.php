<?php require "../../config/config.php"?>
<?php require "../../libs/App.php"?>
<?php include "../layouts/header.php"?>
<?php

$query = "SELECT * FROM orders";
$app = new App;
$app->validateSessionAdminInside();
$orders = $app->selectAll($query);
?>
     <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Town</th>
                    <th scope="col">Country</th>
                    <!-- <th scope="col">Zipcode</th> -->
                    <th scope="col">Phone_number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total_Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody style="font-size: 13px;">
                  <?php foreach($orders as $order) : ?>
                  <tr>
                    <th scope="row"><?php echo $order->id; ?></th>
                    <td><?php echo $order->name; ?></td>
                    <td><?php echo $order->email; ?></td>
                    <td><?php echo $order->town; ?></td>
                    <td><?php echo $order->country; ?></td>
                    <!-- <td>
                     echo $order->zipcode; ?>
                    </td> -->
                    <td><?php echo $order->phone_number; ?></td>
                    <td><?php echo $order->address; ?> </td>
                    <td><span style="font-size: 20px;"> ৳ </span><?php echo $order->total_price; ?></td>
                    <td><?php echo $order->status; ?></td>

                    <td><a href="status.php?id=<?php echo $order->id; ?>" class="btn btn-success  text-center btn-sm">Update</a></td>
                     <td><a href="delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger  text-center btn-sm">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  <?php include "../layouts/footer.php"?>