<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_services = "SELECT * FROM services WHERE status=0";
$select_services_result = mysqli_query($db_connect, $select_services);

$select_trash_service = "SELECT * FROM services WHERE status=1";
$select_trash_service_result = mysqli_query($db_connect, $select_trash_service);
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
                            <h2 class="text-white">SERVICE INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Service Description</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_services_result as $key=>$service){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><i class=" <?=$service['icon'] ?>"></i></td>
                                            <td><?=$service['service_title'] ?></td>
                                            <td><?=$service['service_description'] ?></td>
                                            <td>
                                                <?php if($service['active_status'] == 1){ ?>
                                                    <a href="service_active_status.php?id=<?=$service['id'] ?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="service_active_status.php?id=<?=$service['id'] ?>" class="btn btn-secondary">Deactive</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="service_edit.php?id=<?=$service['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] == 1){ ?>
                                                    <a href="#" id="soft_delete_service.php?id=<?=$service['id'] ?>" class="btn btn-danger delete_service">Delete</a>
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
            $('.delete_service').click(function(){
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
        <?php if(isset($_SESSION['soft_del_service'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['soft_del_service']) ?>

        <?php if(isset($_SESSION['limit'])){ ?>
            <script>
                Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: '<?=$_SESSION['limit']?>',
                })
            </script>
        <?php } unset($_SESSION['limit'])?>
        
    