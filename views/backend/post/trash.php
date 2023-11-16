<?php
   use App\Models\post;
   $list = Post::where('post.status', '=', '0')
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
                     <h1 class="d-inline">Thùng rác bài viết</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <div class="row">
                     <div class="col-md-6 text-left">
                        <a class="text-success" href="index.php?option=post">Tất cả</a>
                        <a class="text-danger" href="index.php?option=post&cat=trash">Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right">
                     <a href="index.php?option=post" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên bài viết</th>
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
                                    <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->name; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->postname; ?>
                                    </div>
                                    <div class="function_style">
                                    <a class="text-danger" href="index.php?option=post&cat=restore&id=<?= $item->id;?>"><i class="fas fa-undo"></i> Khôi Phục</a>  
                                    <a class="text-danger" href="index.php?option=post&cat=destroy&id=<?= $item->id;?>"><i class="fas fa-trash"></i></i> Xoá</a>  
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
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
