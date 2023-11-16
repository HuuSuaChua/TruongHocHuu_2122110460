<?php
   use App\Models\Post;
   $list = Post::where('post.status', '!=', '0')
   ->join('topic','topic.id','=','post.topic_id')
   ->select('post.id','post.status','post.title as postname','post.image','topic.name as topicname')
   ->orderBy('post.created_at', 'desc')->get();
?>
<?php require_once "../views/backend/header.php"; ?>  
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả bài viết</h1>
                  </div>
                  <div class="col-md-12 text-left mt-2 mb-2">
                     <a href="index.php?option=post&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
                  </div>
                  <div class="col-md-6 text-left">
                        <a class="text-success" href="index.php?option=post">Tất cả</a>
                        <a class="text-danger" href="index.php?option=post&cat=trash">Thùng rác</a>
                     </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header p-2">
                  Noi dung
               </div>
               <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tiêu đề bài viết</th>
                           <th>Tên danh mục</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(count($list) > 0) : ?>
                                 <?php foreach ($list as $item): ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                           </td>
                           <td>
                              <div class="title">
                              <?= $item->postname; ?>
                              </div>
                              <div class="function_style">
                                    <?php if($item->status == 1): ?>
                                       <a class="text-success btn-xs" href="index.php?option=post&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Hiện
                                       </a> |
                                       <?php else: ?>
                                          <a class="text-danger btn-xs" href="index.php?option=post&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Ẩn
                                       </a> |
                                       <?php endif; ?>
                                       <a class="text-warning btn-xs" href="index.php?option=post&cat=edit&id=<?= $item->id;?>">
                                       <i class="fas fa-edit"></i>
                                       Chỉnh sửa</a> |
                                       <a class="text-warning btn-xs" href="index.php?option=post&cat=show&id=<?= $item->id;?>">
                                       <i class="fas fa-eye"></i>
                                       Chi tiết</a> |
                                       <a class="text-danger btn-xs" href="index.php?option=post&cat=delete&id=<?= $item->id;?>">
                                       <i class="fas fa-trash"></i>
                                       Xoá</a>
                                       
                                    </div>
                           </td>
                           <td><?= $item->topicname; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
