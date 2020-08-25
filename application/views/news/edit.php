

<h2><?php echo $title; ?></h2>

<?php echo form_open('News/update'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text"  class="form-control" name="title"  value="<?php echo $news_item['title']; ?>" />

    <span style="color: red"><?php echo form_error('title'); ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="text"><?php echo $news_item['text']; ?></textarea>
    <span style="color: red"><?php echo form_error('text'); ?></span>
  </div>
    <input type="hidden"  class="form-control"  name="news_id"  value="<?php echo $news_item['id']; ?>" />
  <button type="submit" class="btn btn-success">Update</button>
