<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_trash_banners = "SELECT * FROM banners WHERE state=1";
$select_trash_banners_result = mysqli_query($db_connect, $select_trash_banners);

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
                                    <th scope="col">Opening</th>
                                    <th scope="col">Title</th>
                                    <th width="20%" scope="col">Description</th>
                                    <th scope="col">Button Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_trash_banners_result as $key=>$trash_banner){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$trash_banner['opening'] ?></td>
                                            <td><?=$trash_banner['title'] ?></td>
                                            <td><?=$trash_banner['description'] ?></td>
                                            <td><?=$trash_banner['btn'] ?></td>
                                            <td>
                                                <img width="50" src="../uploads/banners/<?=$trash_banner['image'] ?>" alt="">
                                            </td>
                                            <td>
                                                <a href="banner_restore.php?id=<?=$trash_banner['id'] ?>" class="btn btn-success">Restore</a>
                                                <a href="#" data-bs-toggle="modal" id="banner_delete.php?id=<?=$trash_banner['id'] ?>" class="btn btn-danger permanent_del">Delete</a>
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
            $('.permanent_del').click(function(){
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
        <?php if(isset($_SESSION['delete_banner'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['delete_banner']) ?>

<?php if(isset($_SESSION['banner_restore'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['banner_restore']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['banner_restore']); ?>
            