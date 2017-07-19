<h2><?php echo $works ?></h2><br>
<div class="list-group">
  <a href="#" class="list-group-item active">
    作品管理介面
  </a>
  <a href="<?php echo base_url(); ?>/works/create" class="list-group-item">新增作品
  </a>
  <a href="<?php echo base_url(); ?>/works/edit/<?php echo $post->id ?>" class="list-group-item">修改作品
  </a>
  <a href="<?php echo base_url(); ?>/works/delete/<?php echo $post->id ?>" class="list-group-item">刪除
  </a>
</div>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      
      <th>作品圖片</th>
      <th>作品名稱</th>
      <th>連結</th>
      <th>作品內容</th>
    </tr>
  </thead>
  <tbody>

    <tr>

      <td><img class="works-thumb" src="http://172.20.10.6/Introduction/application/assets/images/works/<?php echo  $post->img; ?>"</img></td>
      <td><?php echo $post->name; ?></td>
      <td><a href="<?php echo $post->address; ?>"><?php echo $post->address; ?></a></td>
      <td><?php echo $post->content; ?></td>
    </tr>
    
  </tbody>
</table> 