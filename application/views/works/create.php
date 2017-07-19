<?php echo validation_errors(); ?>

<?php echo form_open_multipart('/works/create'); ?>

  <fieldset>
    <legend>新增作品資訊</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
    </div>

    <br>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">address</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="address" placeholder="Address">
       </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-lg-2 control-label">Content</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="content"></textarea>
        </div>
    </div>
      <br>
    <div class="form-group">
      <label class="col-lg-2 control-label">上傳圖片</label>
      <div class="col-lg-10">
        
        <input type="file" name="userfile" size="20">
       
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">        
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

