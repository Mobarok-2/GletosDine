<?php require "../config/config.php"?>
<?php require "../libs/App.php"?>
<?php require "../includes/header.php"?>

<?php   if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        echo "<script>window.location.href='".APPURL."'</script>";
        exit;
    }
    ?>
<?php 
    $query = "SELECT * FROM orders WHERE user_id ='$_SESSION[user_id]'";
    $app = new App;

    $orders = $app->selectAll($query);

 ?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/orders.php?id=<?php echo $_SESSION['user_id']; ?>">Orders</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container " style="text-align: center;">
                
                <div class="col-md-12" style="font-size: 12px;">
                    <table class="table mt-5">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Twon</th>
                            <th scope="col">Country</th>
                            <th scope="col">Zipcode</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Review</th>
                          </tr>
                        </thead>
                        <tbody >

                               <?php foreach($orders as $order) : ?>
                                <tr>
                                    <th><?php echo $order->name; ?></th>
                                    <th><?php echo $order->email; ?></th>                           
                                    <th><?php echo $order->town; ?></th>                           
                                    <th><?php echo $order->country; ?></th>                           
                                    <th><?php echo $order->zipcode; ?></th>                           
                                    <th><?php echo $order->phone_number; ?></th>                           
                                    <th><?php echo $order->address; ?></th>                           
                                    <th>৳<?php echo $order->total_price; ?></th>                           
                                    <th><?php echo $order->status; ?></th>                  
                                    <th><?php echo $order->created_at; ?></th>  
                                    <?php if($order->status == 'confirmed') : ?> 
                                    <td><a href="<?php echo APPURL; ?>/users/review.php" class="btn btn-success text-white" style="font-size: 12px;">review us</td>
                                    <?php endif; ?>                                      
                            <?php endforeach;?>

                        </tbody>
                      </table>
                </div>
            </div>
        <!-- Service End -->
        
        <?php require "../includes/footer.php"?>