<?php
use App\Models\Brand;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$brand = Brand::find($id);
if($brand == null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=brand&cat=brand');
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết brand</h1>
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
                     <a href="index.php?option=brand" class="btn btn-sm btn-info">
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
                                 <td><?=$brand->id; ?></td>
                              </tr>  
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Name</td>
                                 <td><?=$brand->name; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Slug</td>
                                 <td><?=$brand->slug; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Image</td>
                                 <td><?=$brand->image; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Sort_order</td>
                                 <td><?=$brand->sort_order; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Description</td>
                                 <td><?=$brand->description; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Created_at</td>
                                 <td><?=$brand->created_at; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Created_by</td>
                                 <td><?=$brand->created_by; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Updated_at</td>
                                 <td><?=$brand->updated_at; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Updated_by</td>
                                 <td><?=$brand->updated_by; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Status</td>
                                 <td><?=$brand->status; ?></td>
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
