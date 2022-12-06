<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register-Meal Manager</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="<?= base_url('https://fonts.gstatic.com') ?>" rel="preconnect">
  <link href="<?= base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') ?>" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
                  <span class="d-none d-lg-block">Meal Manager</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <?= form_open('') ?>
                    <div class="mb-3 mt-3">
                    <label for="role">Role:</label>
                      <select class="form-control" id="role" name="role">
                          <option value="">select role</option>
                          <?php
                              if($role){
                                  foreach($role as $r){
                          ?>  
                              <option <?= set_value('role')==$r->id?"selected":"" ?> value="<?= $r->id ?>"> <?= $r->role_name ?> </option>
                          <?php }} ?>
                      </select>
                      <b class="text-danger"><?= form_error('role'); ?></b>
                  </div>

                  </div>
                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="name" class="form-label">Your Name</label>
                      <input type="text" value="<?= set_value('name') ?>" name="name" class="form-control" id="name" required>
                      <b class="text-danger"><?= form_error('name'); ?></b>
                    </div>

                    <div class="col-12">
                      <label for="email_address" class="form-label">Your Email</label>
                      <input type="email_address" value="<?= set_value('email_address') ?>" name="email_address" class="form-control" id="email_address" required>
                      <b class="text-danger"><?= form_error('email_address'); ?></b>
                    </div>

                    <div class="col-12">
                      <label for="contact_no" class="form-label">Contact No</label>
                      <input type="contact_no" value="<?= set_value('contact_no') ?>" name="contact_no" class="form-control" id="contact_no" required>
                      <b class="text-danger"><?= form_error('contact_no'); ?></b>
                    </div>

                    <div class="col-12">
                      <label for="uname" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        <input type="text" value="<?= set_value('uname') ?>" name="uname" class="form-control" id="uname" required>
                        <b class="text-danger"><?= form_error('uname'); ?></b>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="pwd" class="form-label">Password</label>
                      <input type="password" name="pswd" class="form-control" id="pwd" required>
                      <b class="text-danger"><?= form_error('pwd'); ?></b>
                    </div>

                    <div class="col-12">
                      <label for="cpwd" class="form-label">Confirm Password</label>
                      <input type="password" name="cpswd" class="form-control" id="cpwd" required>
                      <b class="text-danger"><?= form_error('cpwd'); ?></b>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login">Login</a></p>
                    </div>
                  </form>
                </div>
              </div>
              <div class="credits">
                Designed by <a href="https://www.facebook.com/ShahidCtg49">Shahidul Islam</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/quill/quill.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>