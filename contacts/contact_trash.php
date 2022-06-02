<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_trash_contacts = "SELECT * FROM contacts WHERE status=1";
$select_trash_contacts_result = mysqli_query($db_connect, $select_trash_contacts);

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
                                    <th scope="col">Office Place</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">E-mail</th>
                                    <th width="20%" scope="col">Contact Information</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_trash_contacts_result as $key=>$trash_contact){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$trash_contact['office'] ?></td>
                                            <td><?=$trash_contact['address'] ?></td>
                                            <td><?=$trash_contact['phone'] ?></td>
                                            <td><?=$trash_contact['email'] ?></td>
                                            <td><?=$trash_contact['contact_info'] ?></td>
                                            <td>
                                                <a href="contact_restore.php?id=<?=$trash_contact['id'] ?>" class="btn btn-success">Restore</a>
                                                <a href="#" data-bs-toggle="modal" id="contact_delete.php?id=<?=$trash_contact['id'] ?>" class="btn btn-danger permanent_del">Delete</a>
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
        <?php if(isset($_SESSION['delete_contact'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['delete_contact']) ?>

<?php if(isset($_SESSION['contact_restore'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['contact_restore']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['contact_restore']); ?>
            