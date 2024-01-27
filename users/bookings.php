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
    $query = "SELECT * FROM bookings WHERE user_id ='$_SESSION[user_id]'";
    $app = new App;

    $bookings = $app->selectAll($query);

 ?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/bookings.php?id=<?php echo $_SESSION['user_id']; ?>">Bookings</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container " style=" text-align: center; font-size: 14px" >
                
                <div class="col-md-12">
                    <table class="table mt-5">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date Booking</th>
                            <th scope="col">Number Of Pepole</th>
                            <th scope="col">Special Request</th>
                            <th scope="col">Status</th>                           
                            <th scope="col">Review</th> 
                          </tr>
                        </thead>
                        <tbody >

                               <?php foreach($bookings as $booking) : ?>
                                <tr>
                                    <th><?php echo $booking->name; ?></th>
                                    <th><?php echo $booking->email; ?></th>                           
                                    <th><?php echo $booking->date_booking; ?></th>                           
                                    <th><?php echo $booking->num_people; ?></th>                           
                                    <th><?php echo $booking->special_request; ?></th>                           
                                    <th ><?php echo $booking->status; ?></th>   
                                    <?php if($booking->status == 'confirmed') : ?> 
                                    <td><a href="<?php echo APPURL; ?>/users/review.php" class="btn btn-success text-white" style="font-size: 12px;">review us</td>
                                    <?php endif; ?>  
                                </tr>                     
                            <?php endforeach;?>

                        </tbody>
                      </table>
                </div>
            </div>
        <!-- Service End -->
        
        <?php require "../includes/footer.php"?>