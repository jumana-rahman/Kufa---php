<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_counters = "SELECT * FROM counters WHERE status=0";
$select_counters_result = mysqli_query($db_connect, $select_counters);

$select_trash_counters = "SELECT * FROM counters WHERE status=1";
$select_trash_counters_result = mysqli_query($db_connect, $select_trash_counters);

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <?php if($_SESSION['role'] != 0){ ?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-center">
                            <h2 class="text-white">COUNTER INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Count Number</th>
                                    <th scope="col">Counter Title</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_counters_result as $key=>$counter){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><i class="<?=$counter['counter_icon'] ?>"></i></td>
                                            <td><?=$counter['counter_num'] ?></td>
                                            <td><?=$counter['counter_title'] ?></td>
                                            <td>
                                                <?php if($counter['active_status'] == 1){ ?>
                                                    <a href="counter_active_status.php?id=<?=$counter['id']?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="counter_active_status.php?id=<?=$counter['id']?>" class="btn btn-secondary">Deactive</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="counter_edit.php?id=<?=$counter['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="counter_soft_delete.php?id=<?=$counter['id'] ?>" class="btn btn-danger delete_counter">Delete</a>
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
            $('.delete_counter').click(function(){
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
        <?php if(isset($_SESSION['counter_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['counter_soft_del']) ?>

        <?php if(isset($_SESSION['limit'])){ ?>
            <script>
                Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: '<?=$_SESSION['limit']?>',
                })
            </script>
        <?php } unset($_SESSION['limit'])?>
        
    