<!-- Navbar -->
<?php

include_once('../db/run.php');
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 ?>
<?php
 $getId=$_SESSION["user"]["id"];
if(isset($_REQUEST['btn_sub'])){
    $usrname = $_REQUEST['name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$contact = $_REQUEST['contact'];
$a = "UPDATE user_info SET username='$usrname',email='$email',password='$password',contact='$contact' where id=$getId";
$b = mysqli_query($con,$a);


}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Payment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">pay</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Payment process</h3>
            </div>
            <!-- form start -->
            <form role="form" method="POST" action="payment_core.php">
                <div class="card-body">
                    <div class="form-group">
                    <select style="padding:6px" name="method" required>
                        <option value="">choose</option>
                        <option value="bkash">Bkash merchant number : 01714-805269</option>
                        <option value="Rocket">Rocket merchant number : 01714-805269</option>
                        <option value="Nagad">Nagad merchant number : 01714-805269</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdetname">Phone Number</label>
                        <input required type="text" id="exampleInputdetname" name="phone" class="form-control" placeholder="Enter Phone Number ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdetname1">Amount</label>
                        <input required type="text" id="exampleInputdetname" name="amount" class="form-control" placeholder="Enter Amount ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdetnamee">Transaction Id</label>
                        <input required type="text" id="exampleInputdetname" name="trx_id" class="form-control" placeholder="Enter Transaction Id ">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                    </div>
            </form>
        </div>
</div>

</section>

</div>

<?php
 include_once('layout/footer.php');
 ?>