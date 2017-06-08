<?php $this->load->view('templates/includes/header.php'); ?>
<body>
<div id="fh5co-wrapper">
  <div id="fh5co-page">
    <?php $this->load->view('templates/includes/menu.php'); ?>
    <div class="login-wrapper" style="min-height:350px;padding:120px 0">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section animate-box fadeInUp animated">
            <h1 class="text-center">Newsletter Unsubscribe</h1>
          </div>
          <div class="col-sm-12">
            <div class="thankyou_page">
              <p>You have been unsubscribed.</p>
              <p>You can always rejoin when ever you wish.</p>
              <p>Just enter your email address on our signup form and we will be happy to <strong>Welcome You Back</strongb></p>
              <p><a href="/">Back To Home</a></p>
            </div>
          </div>
        </div>
        <div><?php echo $delete; ?></div>
      </div>
    </div>
    <?php $this->load->view('templates/includes/footer.php'); ?>
  </div>
</div>
</body>
</html>