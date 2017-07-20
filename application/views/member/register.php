<?php echo validation_errors(); ?>

<?php echo form_open('/member/register'); ?>

  <fieldset>
    <legend>註冊</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Account</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="account" placeholder="Account">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
    </div>

    <br>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" placeholder="Name">
       </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Phone</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="phone" placeholder="Phone">
       </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="email" placeholder="Email">
       </div>
    </div>
      <br>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Level</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option value="1">user</option>
          <option value="2">admin</option>          
        </select>
        <br>
       </div>
    </div>
   <input type="hidden" value="1" name="type">
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">        
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>