<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_icons = "SELECT * FROM icons WHERE status=0";
$select_icons_result = mysqli_query($db_connect, $select_icons);

$select_trash_icons = "SELECT * FROM users WHERE status=1";
$select_trash_icons_result = mysqli_query($db_connect, $select_trash_icons);
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <?php if($_SESSION['role'] != 0){ ?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-center">
                            <h2 class="text-white">ICON INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Icon Name</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Icon Link</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_icons_result as $key=>$icon){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$icon['icon_name'] ?></td>
                                            <td><i class="fa <?=$icon['icon_class'] ?>"></i></td>
                                            <td><?=$icon['icon_link'] ?></td>
                                            <td><?=$icon['user_id'] ?></td>
                                            <td>
                                                <?php if($icon['state'] == 1){ ?>
                                                    <a href="icon_state.php?id=<?=$icon['id'] ?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="icon_state.php?id=<?=$icon['id'] ?>" class="btn btn-secondary">Deactive</a>
                                                <?php } ?>

                                                <a href="#" id="soft_delete_icon.php?id=<?=$icon['id'] ?>" class="btn btn-danger delete_icon">Delete</a>
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
            $('.delete_icon').click(function(){
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
        <?php if(isset($_SESSION['soft_del_icon'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['soft_del_icon']) ?>

        <?php if(isset($_SESSION['limit'])){ ?>
            <script>
                Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: '<?=$_SESSION['limit']?>',
                })
            </script>
        <?php } unset($_SESSION['limit'])?>
        
    