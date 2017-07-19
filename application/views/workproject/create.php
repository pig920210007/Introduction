<?php echo validation_errors(); ?>

<?php echo form_open_multipart('/workproject/create'); ?>

  <fieldset>
    <legend>新增工作項目</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
    </div>

    <br>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">worktime</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="worktime" placeholder="年資">
       </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-lg-2 control-label">Content</label>
      <div class="col-lg-10">
        <textarea id="editor1" class="form-control" rows="3" name="content"></textarea>
        </div>
    </div>
      <br>
   
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">        
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>