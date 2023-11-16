<?php
use App\Models\Category;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$category = Category::find($id);
if($category == null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=category&cat=category');
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết Category</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <div class="row">
                     <div class="col-md-12 text-right">
                     <a href="index.php?option=category" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>  
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>ID</td>
                                 <td><?=$category->id; ?></td>
                              </tr>  
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Name</td>
                                 <td><?=$category->name; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Slug</td>
                                 <td><?=$category->slug; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Image</td>
                                 <td><?=$category->image; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Sort_order</td>
                                 <td><?=$category->sort_order; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Description</td>
                                 <td><?=$category->description; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Created_at</td>
                                 <td><?=$category->created_at; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Created_by</td>
                                 <td><?=$category->created_by; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Updated_at</td>
                                 <td><?=$category->updated_at; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Updated_by</td>
                                 <td><?=$category->updated_by; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Status</td>
                                 <td><?=$category->status; ?></td>
                              </tr>
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
