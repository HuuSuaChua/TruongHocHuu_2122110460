<?php 
use App\Models\Post;
use App\Models\Topic;
   $category = Post::where('status','!=',0)
   ->orderBy('created_at','DESC')
   ->get();
   $topic = Topic::where('status','!=',0)
   ->orderBy('created_at','DESC')
   ->get();
   ?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thêm mới bài viết</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=post" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Thêm bài viết
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                           <label>Tiêu đề bài viết (*)</label>
                           <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Chi tiết (*)</label>
                           <textarea name="detail" rows="5" class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Chủ đề (*)</label>
                           <select name="topic_id" class="form-control">
                              <option value="">None</option>
                              <?php foreach ($topic as $ct): ?>
                              <option value="<?=$ct->id?>"><?=$ct->name?></option>
                              <?php endforeach;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <footer class="main-footer">
         <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
         </div>
         <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
         reserved.
      </footer>
   </div>
   <script src="../public/jquery/jquery-3.7.0.min.js"></script>
   <script src="../public/datatables/js/dataTables.min.js"></script>
   <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../public/dist/js/adminlte.min.js"></script>
   <script>
      $(document).ready(function () {
         $('#mytable').DataTable();
      });
   </script>
</body>

</html>