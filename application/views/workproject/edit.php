<?php echo validation_errors(); ?>

<?php echo form_open_multipart('/workproject/update'); ?>

  <fieldset>
    <legend>修改工作項目</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $post->name ?>">
      </div>
    </div>
<input type="hidden"  name="id"  value="<?php echo $post->id ?>">
    <br>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">worktime</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="worktime" placeholder="年資" value="<?php echo $post->worktime ?>">
       </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-lg-2 control-label">Content</label>
      <div class="col-lg-10">
        <textarea id="editor1" class="form-control" rows="3" name="content"><?php echo $post->content ?></textarea>
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

