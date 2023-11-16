<?php
use App\Models\contact;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$contact = contact::find($id);
if($contact == null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=contact&cat=contact');
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết liên hệ</h1>
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
                     <a href="index.php?option=contact" class="btn btn-sm btn-info">
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
                                 <td><?=$contact->id; ?></td>
                              </tr>  
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Name</td>
                                 <td><?=$contact->name; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Email</td>
                                 <td><?=$contact->email; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Phone</td>
                                 <td><?=$contact->phone; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Title</td>
                                 <td><?=$contact->title; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Content</td>
                                 <td><?=$contact->content; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Replay_id</td>
                                 <td><?=$contact->replay_id; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Created_at</td>
                                 <td><?=$contact->created_at; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Created_by</td>
                                 <td><?=$contact->created_by; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Updated_at</td>
                                 <td><?=$contact->updated_at; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Updated_by</td>
                                 <td><?=$contact->updated_by; ?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td>Status</td>
                                 <td><?=$contact->status; ?></td>
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
