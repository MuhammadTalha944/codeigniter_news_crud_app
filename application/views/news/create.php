<h2><?php echo $title; ?></h2>

<?php echo form_open('News/create'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text"  class="form-control" name="title"  value="<?php echo set_value('title'); ?>" />
    <span style="color: red"><?php echo form_error('title'); ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="text"></textarea>
    <span style="color: red"><?php echo form_error('text'); ?></span>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>