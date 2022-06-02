<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$id = $_GET['id'];

$select_education = "SELECT * FROM educations WHERE id=$id";
$select_education_result = mysqli_query($db_connect, $select_education);
$after_assoc = mysqli_fetch_assoc($select_education_result);

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
                        <h2 class="text-white">EDIT EDUCATION INFORMATION</h2>
                      </div>
                      <div class="card-body">
                        <form action="education_update.php" method="POST"> 
                          <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <label for="exampleInputEmail1" class="form-label">Education Year</label>
                            <input type="text" value="<?=$after_assoc['edu_year']?>" name="edu_year" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Education Name</label>
                            <input type="text" value="<?=$after_assoc['edu_name']?>" name="edu_name" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Percentage</label>
                            <input type="text" value="<?=$after_assoc['percentage']?>" name="percentage" class="form-control">
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

        <?php if(isset($_SESSION['update_edu'])){ ?>
            <script>
                Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['update_edu']) ?>
