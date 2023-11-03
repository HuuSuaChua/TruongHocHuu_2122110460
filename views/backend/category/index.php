<?php
   use App\Models\Category;
   $list = Category::where('status','!=',0)
   ->select('status','id','image','name','slug')
   ->orderBy('created_at','DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-date">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả danh mục</h1>
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
                        <a class="text-success" href="index.php?option=category">Tất cả</a>
                        <a class="text-danger" href="index.php?option=category&cat=trash">Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
                     </div>
                  </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên Danh mục (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô tả</label>
                           <textarea  name="description" class="form-control"></textarea>
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
                     <div class="col-md-8">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên Danh mục</th>
                                 <th>Tên slug</th>
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
                                    <img class="img-fluid" src="../public/images/category/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                    <?php if($item->status == 1): ?>
                                       <a class="text-success btn-xs" href="index.php?option=category&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Hiện
                                       </a> |
                                       <?php else: ?>
                                          <a class="text-danger btn-xs" href="index.php?option=category&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Ẩn
                                       </a> |
                                       <?php endif; ?>
                                       <a class="text-warning btn-xs" href="index.php?option=category&cat=edit&id=<?= $item->id;?>">
                                       <i class="fas fa-edit"></i>
                                       Chỉnh sửa</a> |
                                       <a class="text-warning btn-xs" href="index.php?option=category&cat=show&id=<?= $item->id;?>">
                                       <i class="fas fa-eye"></i>
                                       Chi tiết</a> |
                                       <a class="text-danger btn-xs" href="index.php?option=category&cat=delete&id=<?= $item->id;?>">
                                       <i class="fas fa-trash"></i>
                                       Xoá</a>
                                       
                                    </div>
                                 </td>
                                 <td><?= $item->slug; ?></td>
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
      </form>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>