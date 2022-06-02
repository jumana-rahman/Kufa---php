<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';
?>
    
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
  </nav>

  <div class="sl-pagebody">
    <form action="post.php" method="POST" enctype="multipart/form-data">
      <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
          <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">vampire <span class="tx-info tx-normal">admin</span></div>
          <div class="tx-center mg-b-60">Professional Admin Template Design</div>

          <div class="form-group">
            <input type="text" name="name" value="<?=(isset($_SESSION['name']))?$_SESSION['name']:'' ?>" class="form-control" placeholder="Enter your name">

            <?php if(isset($_SESSION['errors']['name'])){ ?>
              <div class="alert alert-danger mt-2">
                <?=$_SESSION['errors']['name']?>
              </div>
            <?php } unset($_SESSION['errors']['name']) ?>
          </div><!-- form-group -->
          <div class="form-group">
            <input type="email" name="email" value="<?=(isset($_SESSION['email']))?$_SESSION['email']:'' ?>" class="form-control" placeholder="Enter your email">

            <?php if(isset($_SESSION['errors']['email'])){ ?>
              <div class="alert alert-danger mt-2">
                <?=$_SESSION['errors']['email']?>
              </div>
            <?php } unset($_SESSION['errors']['email']) ?> 

            <?php if(isset($_SESSION['email_exist'])){ ?>
              <div class="alert alert-warning">
                <?=$_SESSION['email_exist']?>
              </div>
            <?php } unset($_SESSION['email_exist']) ?>
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" name="password" value="<?=(isset($_SESSION['password']))?$_SESSION['password']:'' ?>" class="form-control" placeholder="Enter your password">

            <?php if(isset($_SESSION['errors']['password'])){ ?>
              <div class="alert alert-danger mt-2">
                <?=$_SESSION['errors']['password']?>
              </div>
            <?php } unset($_SESSION['errors']['password']) ?>
          </div><!-- form-group -->
          <div class="form-group">
            <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Country</label>
              <select class="form-control" name="country" data-placeholder="Month">
                <option value="">-- Select Your Country --</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
              </select>
          </div><!-- form-group -->
          <div class="form-group">
            <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Role</label>
              <select class="form-control" name="role" data-placeholder="Month">
                <option value="">-- Select Role --</option>
                <option value="1">Admin</option>
                <option value="2">Moderator</option>
                <option value="3">Viewer</option>
                <option value="0">User</option>
              </select>
          </div><!-- form-group -->
          <div class="form-group">
            <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Image</label>
            <input type="file" name="image" class="form-control">
          </div><!-- form-group -->
          <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>

          <div class="mg-t-40 tx-center">Already have an account? <a href="/kufa/login.php" class="tx-info">Sign In</a></div>
        </div><!-- login-wrapper -->
      </div><!-- d-flex -->
    </form>
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

<?php 
require '../dashboard_includes/footer.php';
unset($_SESSION['email']);
unset($_SESSION['password']);
?>

<?php if(isset($_SESSION['success'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['success']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['success']); ?>

