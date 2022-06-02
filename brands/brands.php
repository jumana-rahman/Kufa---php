<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_brands = "SELECT * FROM brands WHERE status=0";
$select_brands_result = mysqli_query($db_connect, $select_brands);

$select_trash_brands = "SELECT * FROM brands WHERE status=1";
$select_trash_brands_result = mysqli_query($db_connect, $select_trash_brands);

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <?php if($_SESSION['role'] != 0){ ?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-center">
                            <h2 class="text-white">BRAND INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Brand Photo</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_brands_result as $key=>$brand){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td>
                                                <img width="100" src="../uploads/brands/<?=$brand['brand_photo'] ?>" alt="">
                                            </td>
                                            <td>
                                                <?php if($brand['active_status'] == 1){ ?>
                                                    <a href="brand_active_status.php?id=<?=$brand['id']?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="brand_active_status.php?id=<?=$brand['id']?>" class="btn btn-secondary">Active</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="brand_edit.php?id=<?=$brand['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="brand_soft_delete.php?id=<?=$brand['id'] ?>" class="btn btn-danger delete_brand">Delete</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    <?php } ?>
    <!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_includes/footer.php'; ?>

        <script>
            $('.delete_brand').click(function(){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=$(this).attr('id');
                }
                })
            })
        </script>
        <?php if(isset($_SESSION['brand_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['brand_soft_del']) ?>

        <?php if(isset($_SESSION['limit'])){ ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'warning',
                title: '<?=$_SESSION['limit']?>',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
        <?php } unset($_SESSION['limit']); ?>
        
    