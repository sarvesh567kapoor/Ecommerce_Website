<?php
require('header.inc.php');
$categories1 = '';
$msg='';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_save_value($conn, $_GET['id']);
    $sql2 = "select * from categories where id =" . $id;
    $result2 = mysqli_query($conn, $sql2);
    $check = mysqli_num_rows($result2);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result2);
        $categories1 = $row['category'];
    } else {
        header('location: categories.php');
        die();
    }
}

if (isset($_POST['submit']) && $_POST['categories'] != '') {
    $categories = get_save_value($conn, $_POST['categories']);

    $sql3 = "select * from categories where category ='$categories'";
    $result3 = mysqli_query($conn, $sql3);
    $check2 = mysqli_num_rows($result3);
    if($check2 > 0) {

        if (isset($_GET['id']) && $_GET['id'] != ''){
          $getData= mysqli_fetch_assoc($result3);
          if($id== $getData['id']){

          }
          else{
            $msg = "Categories already exist";
          }

        }
        else {

        $msg = "Categories already exist";
        }
    }
  if($msg==''){
    if (isset($_GET['id']) && $_GET['id'] != '') {

        $sql = "update  categories set category= '$categories' where id = '$id'";
        $result = mysqli_query($conn, $sql);
    } 
    else {
        $sql = "insert into categories(category,status) values('$categories','1')";
        $result = mysqli_query($conn, $sql);
    }
    header('location: categories.php');
    die();
  }
}



?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form action="" method="post">
                        <div class="card-body card-block">
                            <div class="form-group"><label for="category" class=" form-control-label">Categories</label><input type="text" name="categories" placeholder="Enter categories name" required value="<?php echo $categories1; ?>" class="form-control"></div>

                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span>Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg; ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');
?>