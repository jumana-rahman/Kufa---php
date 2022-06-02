<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_contact = "SELECT * FROM contacts WHERE id=$id";
$select_contact_result = mysqli_query($db_connect, $select_contact);
$after_assoc_contact = mysqli_fetch_assoc($select_contact_result);

?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">EDIT CONTACT</h3>
                        </div>
                        <div class="card-body">
                            <form action="contact_update.php" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc_contact['id']?>">
                                    <label for="" class="form-label-control">Office Place</label>
                                    <input value="<?=$after_assoc_contact['office']?>" type="text" name="office" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Address</label>
                                    <input value="<?=$after_assoc_contact['address']?>" type="text" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Phone</label>
                                    <input value="<?=$after_assoc_contact['phone']?>" type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">E-mail</label>
                                    <input value="<?=$after_assoc_contact['email']?>" type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-form-control">Contact Information</label>
                                    <textarea value="<?=$after_assoc_contact['contact_info']?>" name="contact_info" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require '../dashboard_includes/footer.php'; ?>

<?php if(isset($_SESSION['update_contact'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_contact']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_contact']); ?>