<?php echo form_open('member/login'); ?>
   <div class="row">
      <div class="col-md-4 col-md-offset-4">
         <h1 class="text-center"><?php echo $title2; ?></h1>
         <div class="form-group">
         <input type="text" name="account" class="form-control" placeholder="Enter Account" required autofocus>
         </div>
          <div class="form-group">
         <input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
         </div>
         <button type="submit" class="btn btn-primary btn-block">Login</button>
         <button type="button" class="btn btn-primary btn-block" onclick="location.href='<?php echo $authUrl ?>'">Google-Login</button>
         <button type="button" class="btn btn-primary btn-block" onclick="location.href='<?php echo $authUrl2 ?>'">Facebook-Login</button>
         </div>
         </div>
         <?php echo form_close(); ?>