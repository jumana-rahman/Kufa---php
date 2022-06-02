<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_trash_counters = "SELECT * FROM counters WHERE status=1";
$select_trash_counters_result = mysqli_query($db_connect, $select_trash_counters);

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
                                    <th scope="col">Icon</th>
                                    <th scope="col">Count Number</th>
                                    <th scope="col">Counter Title</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_trash_counters_result as $key=>$trash_counter){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><i class="<?=$trash_counter['counter_icon'] ?>"></i></td>
                                            <td><?=$trash_counter['counter_num'] ?></td>
                                            <td><?=$trash_counter['counter_title'] ?></td>
                                            <td>
                                                <a href="counter_restore.php?id=<?=$trash_counter['id'] ?>" class="btn btn-success">Restore</a>
                                                <a href="#" data-bs-toggle="modal" id="counter_delete.php?id=<?=$trash_counter['id'] ?>" class="btn btn-danger permanent_del">Delete</a>
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
        <?php if(isset($_SESSION['delete_counter'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['delete_counter']) ?>

<?php if(isset($_SESSION['counter_restore'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['counter_restore']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['counter_restore']); ?>
            