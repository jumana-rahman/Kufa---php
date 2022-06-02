<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_menu = "SELECT * FROM menus WHERE id=$id";
$select_menu_result = mysqli_query($db_connect, $select_menu);
$after_assoc_menu = mysqli_fetch_assoc($select_menu_result);

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
                            <h3 class="text-center">EDIT MENU</h3>
                        </div>
                        <div class="card-body">
                            <form action="menu_update.php" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc_menu['id']?>">
                                    <label for="" class="form-label-control">Menu Name</label>
                                    <input value="<?=$after_assoc_menu['menu_name']?>" type="text" name="menu_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Menu Link</label>
                                    <input value="<?=$after_assoc_menu['menu_link']?>" type="text" name="menu_link" class="form-control">
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

<?php if(isset($_SESSION['update_menu'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_menu']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_menu']); ?> 