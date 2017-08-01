<h2><?php echo $post->name ?></h2>
<?php if($this->session->userdata('level') ==2) : ?>
<div class="list-group">
  <a href="#" class="list-group-item active">
    作品管理介面
  </a>
  <a href="<?php echo base_url(); ?>/workproject/create" class="list-group-item">新增作品
  </a>
  <a href="<?php echo base_url(); ?>/workproject/edit/<?php echo $post->id ?>" class="list-group-item">修改作品
  </a>
  <a href="<?php echo base_url(); ?>/workproject/delete/<?php echo $post->id ?>" class="list-group-item">刪除
  </a>
</div>
<?php endif; ?>
<blockquote>
  <p><?php echo $post->content ?></p>
  
</blockquote>