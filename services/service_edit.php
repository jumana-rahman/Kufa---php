<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$id = $_GET['id'];

$select_service = "SELECT * FROM services WHERE id=$id";
$select_service_result = mysqli_query($db_connect, $select_service);
$after_assoc_service = mysqli_fetch_assoc($select_service_result);

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
        <div class="row">
                <div class="col-lg-9 m-auto">
                    <div class="card border-primary">
                      <div class="card-header bg-primary text-center">
                        <h2 class="text-white">EDIT SERVICE INFORMATION</h2>
                      </div>
                      <div class="card-body">
                        <form action="service_update.php" method="POST"> 
                          <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$after_assoc_service['id']?>">
                            <label for="exampleInputEmail1" class="form-label">Icon</label>
                            <input type="text" value="<?=$after_assoc_service['icon']?>" name="icon" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Service Title</label>
                            <input type="text" value="<?=$after_assoc_service['service_title']?>" name="service_title" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Service Description</label>
                            <textarea type="text" value="<?=$after_assoc_service['service_description']?>" name="service_description" class="form-control"></textarea>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_includes/footer.php';  ?>

<?php if(isset($_SESSION['update_service'])){ ?>
  <script>
      Swal.fire(
      'Updated!',
      'Your file has been updated.',
      'success'
      )
  </script>
<?php } unset($_SESSION['update_service']) ?>
