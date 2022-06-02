<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_trash_icons = "SELECT * FROM icons WHERE status=1";
$select_trash_icons_result = mysqli_query($db_connect, $select_trash_icons);

?>

<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <!-- Trash -->
                    <div class="card border-danger mt-5">
                        <div class="card-header bg-danger text-center">
                            <h2 class="text-white">TRASH</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-danger table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Icon Name</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Icon Link</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_trash_icons_result as $key=>$trash_icon){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$trash_icon['icon_name'] ?></td>
                                            <td><i class="fa <?=$trash_icon['icon_class'] ?>"></i></td>
                                            <td><?=$trash_icon['icon_link'] ?></td>
                                            <td>
                                                <a href="restore_icon.php?id=<?=$trash_icon['id'] ?>" class="btn btn-success">Restore</a>
                                                <a href="#" data-bs-toggle="modal" id="delete_icon.php?id=<?=$trash_icon['id'] ?>" class="btn btn-danger del_icon">Delete</a>
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

    <?php require '../dashboard_includes/footer.php';  ?> 
    
    <script>
            $('.del_icon').click(function(){
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
        <?php if(isset($_SESSION['delete_icon'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['delete_icon']) ?>

<?php if(isset($_SESSION['restore_icon'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['restore_icon']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['restore_icon']); ?>
            