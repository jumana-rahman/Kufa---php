<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_contacts = "SELECT * FROM contacts WHERE status=0";
$select_contacts_result = mysqli_query($db_connect, $select_contacts);

$select_trash_contacts = "SELECT * FROM contacts WHERE status=1";
$select_trash_contacts_result = mysqli_query($db_connect, $select_trash_contacts);

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
                            <h2 class="text-white">CONTACT INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL No.</th>
                                        <th scope="col">Office PLace</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">E-mail</th>
                                        <th width="20%" scope="col">Contact Information</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_contacts_result as $key=>$contact){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$contact['office'] ?></td>
                                            <td><?=$contact['address'] ?></td>
                                            <td><?=$contact['phone'] ?></td>
                                            <td><?=$contact['email'] ?></td>
                                            <td><?=$contact['contact_info'] ?></td>
                                            <td>
                                                <?php if($contact['active_status'] == 1){ ?>
                                                    <a href="contact_active_status.php?id=<?=$contact['id']?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="contact_active_status.php?id=<?=$contact['id']?>" class="btn btn-secondary">Active</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="contact_edit.php?id=<?=$contact['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="contact_soft_delete.php?id=<?=$contact['id'] ?>" class="btn btn-danger delete_contact">Delete</a>
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
            $('.delete_contact').click(function(){
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
        <?php if(isset($_SESSION['con_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['con_soft_del']) ?>
        
    