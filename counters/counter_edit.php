<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_counter = "SELECT * FROM counters WHERE id=$id";
$select_counter_result = mysqli_query($db_connect, $select_counter);
$after_assoc = mysqli_fetch_assoc($select_counter_result);

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
                            <h3 class="text-center">EDIT BANNER</h3>
                        </div>
                        <div class="card-body">
                            <form action="counter_update.php" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                    <label for="" class="form-label-control">Icon</label>
                                    <input value="<?=$after_assoc['counter_icon']?>" type="text" name="counter_icon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Count Number</label>
                                    <input value="<?=$after_assoc['counter_num']?>" type="text" name="counter_num" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Counter Title</label>
                                    <input value="<?=$after_assoc['counter_title']?>" type="text" name="counter_title" class="form-control">
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

<?php if(isset($_SESSION['update_counter'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_counter']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_counter']); ?> 