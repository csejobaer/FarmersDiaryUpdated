<?php
  session_start();  
  include_once 'class.php'; 
  include_once 'database.php';

  $user = new User;  
  $id = $_SESSION['id'];  
  $type = $_SESSION['type'];

  if (!isset($_SESSION["id"])) {
    header("location:login.php");  
} 

$database = new DatabaseConnection();
$farmerObject = new Farmers();
$farmerObject->getFarmersData($id);



?><!DOCTYPE html>
<html lang="en">
    <head>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <title>Login - Farmer's Diary</title>
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        
        <!-- SOCIAL MEDIA META -->
        
        
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
    </head>
    <body style="background:#1b253b;">
    
        <div class="dashboard">

                    <!-- Admin Menu  -->
                    <?php include_once('user-sidebar.php'); ?>
                    <!-- Admin Menu  -->

                <div class="content-body">
                    
                    <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <!-- admin top   -->
                            <div class="header-top-admin">
                                
                                <div class="breadcrumbs float-left">
                                    <ul>
                                        <li><a href="">Application</a></li>
                                        <span> > </span>
                                        <li><a href="">Bought Items</a></li>
                                    </ul>
                                </div>
                                <div class="profile-area float-right">
                                    <div class="profile-icon">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icofont-notification"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icofont-business-man"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- admin topbar   -->
                        </div> 
                    </div> 

                    <!-- Deshboard content  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-title">
                                <h2>My <span class="highlight">Bought</span> Items</h2>
                                <<p> <?php 
function Greetings($hours)
{
    if ($hours >= 0 && $hours <= 12) {
        return "Good Morning.";
    } else {
        if ($hours > 12 && $hours <= 17) {
            return "Good Afternoon.";
        } else {
            if ($hours > 17 && $hours <= 20) {
                return "Good Evening";
            } else {
                return "Good Night";
            }
        }
    }
}
$hour = date('H');
print Greetings($hour);
?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="print-btn float-right">
                                <button class="btn btn-default save"><i class="icofont-save" id="save"></i> Save</button>
                                <button class="btn btn-default print"><i class="icofont-printer"></i> Print</button>
                            </div>
                        </div>
                    </div>
                    <!-- Deshboard content  -->
                    <div class="row table-area">
                        
                        <?php 
                            include_once('user-and-company-info.php');
                         ?>
                        <div class="deshboard-header-line bought">
                            <ul>
                                <li><strong>Account: </strong><?php echo $id; ?></li>
                                <li><strong>Date:</strong> <?php echo date("F j, Y");?></li>
                                <li><strong>Total Token: </strong>367</li>
                                <li><Strong>Invoice: </Strong>0</li>
                            </ul>
                            <p>Investment in agriculture is the best weapon against hunger and poverty, and they have made life better for billions of people.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="table-content table-responsive bought">
                                <table class="table" id="dataTable">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Seller</th>
                                            <th>Product Name</th>
                                            <th>Weight</th>
                                            <th>Unit Price</th>
                                            <th>Vat</th>
                                            <th>Extra charge</th>
                                            <th>Date</th>
                                            <th>Total Price</th>
                                            <th>Delete</th>
                                            <th>Update</th>
                                            <th>Action</th>
                                        </tr>


                                        <?php 

                                        /*=================================
                                        ***************** Products Table Data
                                        ===================================*/        
                                          
                                            $boughtItems = "SELECT * FROM products WHERE buyer_id = '$id'";
                                            $boughtItemsExecute = $database->query_execute($boughtItems);
                                            if ($boughtItemsExecute->num_rows > 0) {
                                                while ($row = $boughtItemsExecute->fetch_assoc()) {
                                            /*=================================
                                            ***************** Product_details Table Data
                                            ===================================*/
                                              $pname = "";
                                            $vat = 0;
                                            $extra = 0;
                                            $weight = 0;
                                            $unit_price = 0;
                                            $totalPrice = 0;

                                            $product_id = $row['product_id'];
                                            $date = $row['datas'];
                                            $productDetails = "SELECT * FROM prodcut_details WHERE '$product_id'= product_id";
                                            $productExecute = $database->query_execute($productDetails);
                                            if ($productExecute->num_rows > 0) {
                                                while ($rowDetails = $productExecute->fetch_assoc()) {
                                                    $pname .= $rowDetails['product_name']." ";
                                                    $weight+=$rowDetails['weight'];
                                                    $unit_price = $rowDetails['unit_price'];
                                                    $vat += $rowDetails['vat'];
                                                    $extra +=$rowDetails['extra_charge'];
                                                    $totalPrice+= ($unit_price*$weight)+($vat+$extra);

                                                }
                                            }

                                                    ?>


                                        <tr>
                                            <td><?php echo $row['product_id'];?></td>
                                            <td>Samsu</td>
                                            <td><?php echo $pname;?></td>
                                            <td><?php echo $weight;?></td>
                                            <td><?php echo $unit_price;?></td>
                                            <td><?php echo $vat;?></td>
                                            <td><?php echo $extra;?></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $totalPrice;?></td>
                                            <td><button class="btn-danger delete" delete="<?php echo $row['product_id'];?>" type="button" data-toggle="modal" data-target="#deleteOk"><span class="icofont-delete"></span></button></td>
                                            <td><button class="btn-primary save" type="button"  data-toggle="modal" data-target="#edit<?php echo $row['product_id'];?>"><span class="icofont-edit"></span></button></td>
                                            <td><button class="btn btn-default save" type="button"  data-toggle="modal" data-target="#<?php echo $row['product_id'];?>">Details</button></td>
                                        </tr>    
                                            <?php }
                                            }


                                         ?>







                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>
                    

                 </div>
        </div>
     

        


<?php

/*=================================
***************** Products Table Data
===================================*/        
    $pname = "";
    $vat = 0;
    $extra = 0;
    $weight = 0;
    $totalPrice = 0;

    $boughtItems = "SELECT * FROM products WHERE buyer_id = '$id'";
    $boughtItemsExecute = $database->query_execute($boughtItems);
    if ($boughtItemsExecute->num_rows > 0) {
        while ($row = $boughtItemsExecute->fetch_assoc()) {
    /*=================================
    ***************** Product_details Table Data
    ===================================*/
  ?>  


  <!-- Modal -->
  <div class="modal fade" id="<?php echo $row['product_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Product details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tbody>
                <tr>
                    <th>Item</th>
                    <th>Weight</th>
                    <th>Price/Unit</th>
                    <th>Vat</th>
                    <th>Extra Charge</th>
                    <th>Total Price</th>
                </tr>






<?php 
    $product_id = $row['product_id'];
    $date = $row['datas'];
    $productDetails = "SELECT * FROM prodcut_details WHERE '$product_id'= product_id";
    $productExecute = $database->query_execute($productDetails);
    if ($productExecute->num_rows > 0) {
        while ($rowDetails = $productExecute->fetch_assoc()) {
            $totalPrice+= ($rowDetails['unit_price'] * $rowDetails['weight'])+($rowDetails['vat']+$rowDetails['extra_charge']);

?>

                <tr>
                    <td><?php echo $rowDetails['product_name'];?></td>
                    <td><?php echo $rowDetails['weight'];?></td>
                    <td><?php echo $rowDetails['unit_price'];?></td>
                    <td><?php echo $rowDetails['vat'];?></td>
                    <td><?php echo $rowDetails['extra_charge'];?></td>
                    <td><?php echo $totalPrice;?></td>
                </tr>


                <?php 


                        }
                    }

            ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


  <?php

            }

        }
  ?>




















<?php

/*=================================
***************** Products Edit table
===================================*/        
    $pname = "";
    $vat = 0;
    $extra = 0;
    $weight = 0;
    $totalPrice = 0;

    $boughtItems = "SELECT * FROM products WHERE buyer_id = '$id'";
    $boughtItemsExecute = $database->query_execute($boughtItems);
    if ($boughtItemsExecute->num_rows > 0) {
        while ($row = $boughtItemsExecute->fetch_assoc()) {
    /*=================================
    ***************** Product_details Table Data
    ===================================*/
  ?>  


  <!--Edit Modal -->
  <div class="modal fade" id="edit<?php echo $row['product_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Product Update*</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tbody>
                <tr>
                    <th>Item</th>
                    <th>Weight</th>
                    <th>Price/Unit</th>
                    <th>Vat</th>
                    <th>Extra Charge</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>






<?php 
    $product_id = $row['product_id'];
    $date = $row['datas'];
    $productDetails = "SELECT * FROM prodcut_details WHERE '$product_id'= product_id";
    $productExecute = $database->query_execute($productDetails);
    if ($productExecute->num_rows > 0) {
        while ($rowDetails = $productExecute->fetch_assoc()) {
            $totalPrice+= $rowDetails['unit_price'] * $rowDetails['weight'];

?>

                <tr id="edit_data_tr<?php echo $rowDetails['product_details_id'];?>" class="update_class<?php echo $rowDetails['product_details_id'];?>">
                    <td class="item"><?php echo $rowDetails['product_name'];?></td>
                    <td class="weight"><?php echo $rowDetails['weight'];?></td>
                    <td class="price"><?php echo $rowDetails['unit_price'];?></td>
                    <td class="vat"><?php echo $rowDetails['vat'];?></td>
                    <td class="extra-charge"><?php echo $rowDetails['extra_charge'];?></td>
                    <td class="total"><?php echo $totalPrice;?></td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#edit_<?php echo $rowDetails['product_details_id'];?>" id="edit_data<?php echo $rowDetails['product_details_id'];?>">Update</button></td>
                </tr>


                <?php 


                        }
                    }

            ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary page_reload" onclick="reloadPage();" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


  <?php

            }

        }
  ?>



<?php

/*=================================
***************** Products Edit table Input fields
===================================*/        
    $pname = "";
    $vat = 0;
    $extra = 0;
    $weight = 0;
    $totalPrice = 0;

    $boughtItems = "SELECT * FROM products WHERE buyer_id = '$id'";
    $boughtItemsExecute = $database->query_execute($boughtItems);
    if ($boughtItemsExecute->num_rows > 0) {
        while ($row = $boughtItemsExecute->fetch_assoc()) {
    /*=================================
    ***************** Product_details Table Data
    ===================================*/
  ?>  


  <!-- Single product edit -->
<!-- Button trigger modal -->

<?php 
    $product_id = $row['product_id'];
    $date = $row['datas'];
    $productDetails = "SELECT * FROM prodcut_details WHERE '$product_id'= product_id";
    $productExecute = $database->query_execute($productDetails);
    if ($productExecute->num_rows > 0) {
        while ($rowDetails = $productExecute->fetch_assoc()) {
            $totalPrice+= $rowDetails['unit_price'] * $rowDetails['weight'];

?>



<!-- Modal -->
<div class="modal fade" id="edit_<?php echo $rowDetails['product_details_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Item: <span id="nochange"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body update_class<?php echo $rowDetails['product_details_id'];?>">

        <div class="form-group">
            <!-- single field -->
            <label for="update_name">Product name</label>
            <input type="text" value="<?php echo $rowDetails['product_name'];?>" name="update_name" id="update_name" class="form-control">
            <!-- /single field -->
            <!-- single field -->
            <label for="update_unit">Unit price</label>
            <input type="number" value="<?php echo $rowDetails['unit_price'];?>" name="update_unit" id="update_unit" class="form-control">
            <!-- /single field -->
            <!-- single field -->
            <label for="weight">Weight</label>
            <input type="number" value="<?php echo $rowDetails['weight'];?>" name="update_weight" id="update_weight" class="form-control">
            <!-- /single field -->
            <!-- single field -->
            <label for="extras">Extra Charge</label>
            <input type="number" value="<?php echo $rowDetails['extra_charge'];?>" name="update_extras" id="update_extras" class="form-control">
            <!-- /single field -->
            <!-- single field -->
            <label for="update_vat">Vat</label>
            <input type="number" value="<?php echo $rowDetails['vat'];?>" name="update_vat" id="update_vat" class="form-control">
            <!-- /single field -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update_now" product_id='<?php echo $rowDetails['product_details_id'];?>' class="update_class<?php echo $rowDetails['product_details_id'];?>">Save changes</button>
      </div>
    </div>
  </div>
</div>


  <?php

            }

        }
  ?>


    <?php

            }

        }
  ?>


<!-- Delete confirmation Option -->

<!-- Modal -->
<div class="modal fade" id="deleteOk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Now</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 style="color:#e00; text-align: center;">Are you sure to delte the item?.<br/> <span class="icofont-delete" style="font-size: 40px"></span></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" onclick="reloadPage();"  id="confirm">Yes</button>
      </div>
    </div>
  </div>
</div>



        <!-- /Footer  -->
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>