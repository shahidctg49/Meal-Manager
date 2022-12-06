<main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="users">Users</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <?php if($this->session->flashdata('msg')){
						echo $this->session->flashdata('msg');
					} ?>
              <img src="<?= base_url('assets/img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle">
              <h2>Shahidul Islam</h2>
              <h3>Meal Manager</h3>
              <div class="social-links mt-2">
                <a href="https://twitter.com/ShahidCtg49" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/ShahidCtg49" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/shahidctg49/?hl=en" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/in/shahidctg49/" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
          <?php $attributes = array('class' => 'form-horizontal'); ?>
							<?= form_open_multipart('',$attributes) ?>
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">     
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                  <?php $attributes = array('class' => 'form-horizontal'); ?>
							    <?= form_open_multipart('',$attributes) ?>
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-sm-10">
										<input type="text" class="form-control" value="<?= set_value('name', $userdata->name) ?>" name="name" id="uname">
										<span class="help-block"><small><?= form_error('name'); ?></small></span>
									</div>
                  </div>
                  <div class="form-group row">
									<label class="col-sm-2 control-label" for="email_address">Email</label>
									<div class="col-sm-10">
										<input type="email" id="email_address" name="email_address" class="form-control" value="<?= set_value('email_address)', $userdata->email_address) ?>">
										<span class="help-block"><small><?= form_error('email_address'); ?></small></span>
									</div>
								</div>
                <div class="form-group row">
									<label class="col-sm-2 control-label" for="contact_no">Contact</label>
									<div class="col-sm-10">
										<input type="text" id="contact_no" name="contact_no" class="form-control" value="<?= set_value('contact_no)', $userdata->contact_no) ?>">
										<span class="help-block"><small><?= form_error('contact_no'); ?></small></span>
									</div>
								</div>
                <div class="form-group row">
									<label class="col-sm-2 control-label" for="username">Username</label>
									<div class="col-sm-10">
										<input type="text" id="username" name="username" class="form-control" value="<?= set_value('username)', $userdata->username) ?>">
										<span class="help-block"><small><?= form_error('username'); ?></small></span>
									</div>
								</div>
                <div class="form-group row">
									<label class="col-sm-2 control-label" for="photo">Photo</label>
									<div class="col-sm-10">
										<input type="file" id="photo" name="photo" class="form-control" onchange="pview(this)">
										<img src="<?= base_url('upload/profile/demo.jpg') ?>" id="photo_p" class="my-1" width="100px" alt="">
									</div>
								</div>
                <div class="form-group row">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</div>
                </div>           
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->