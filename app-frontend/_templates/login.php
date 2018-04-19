    <div class="loginmodal-container">
     <h1>LOGIN</h1><br>

  <?php
     if (!empty($this->session->flashdata('msg'))):
        $msg = $this->session->flashdata('msg');
  ?>
  <?php if($msg['type'] == 'success'): ?>
     <div class="alert alert-success"><?=$msg['message'];?></div>
  <?php elseif ($msg['type'] == 'warning'): ?>
     <div class="alert alert-warning"><?=$msg['message'];?></div>
  <?php elseif ($msg['type'] == 'error'): ?>
     <div class="alert alert-danger"><?=$msg['message'];?></div>
  <?php else: ?>
     <div class="alert alert-info"><?=$msg['message'];?></div>
  <?php endif; ?>
 <?php endif; ?>

     <form method="POST" action="<?=site_url('auth/checkLogin');?>">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
     </form>
     
      <div class="login-help">
        <a href="<?=base_url();?>">Back to Home</a>
      </div>
    </div>