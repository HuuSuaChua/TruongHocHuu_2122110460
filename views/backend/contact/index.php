<?php
   use App\Models\Contact;
   $list = Contact::where('status','!=',0)
   ->orderBy('created_at','DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>  
      <!-- CONTENT -->
      <div class="content-wrapper">
      <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả liên hệ</h1>
                     </div>
                     <div class="col-sm-12 mt-2 mb-2">
                        <a href="index.php?option=contact&cat=create" class="btn btn-sm btn-primary">Thêm liên hệ</a>
                     </div>
                     <div class="col-md-6 text-left">
                        <a class="text-success" href="index.php?option=contact">Tất cả</a>
                        <a class="text-danger" href="index.php?option=contact&cat=trash">Thùng rác</a>
                     </div>
                  </div>
               </div>
            </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                 Nội dung
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                           <th>Tiêu đề</th>
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
                              <div class="name">
                              <?= $item->name; ?>
                              </div>
                              <div class="function_style">
                                    <?php if($item->status == 1): ?>
                                       <a class="text-success btn-xs" href="index.php?option=contact&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Hiện
                                       </a> |
                                       <?php else: ?>
                                          <a class="text-danger btn-xs" href="index.php?option=contact&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Ẩn
                                       </a> |
                                       <?php endif; ?>
                                       <a class="text-warning btn-xs" href="index.php?option=contact&cat=edit&id=<?= $item->id;?>">
                                       <i class="fas fa-edit"></i>
                                       Chỉnh sửa</a> |
                                       <a class="text-warning btn-xs" href="index.php?option=contact&cat=show&id=<?= $item->id;?>">
                                       <i class="fas fa-eye"></i>
                                       Chi tiết</a> |
                                       <a class="text-danger btn-xs" href="index.php?option=contact&cat=delete&id=<?= $item->id;?>">
                                       <i class="fas fa-trash"></i>
                                       Xoá</a>
                                       
                                    </div>
                           </td>
                           <td> <?= $item->phone; ?></td>
                           <td> <?= $item->email; ?></td>
                           <td> <?= $item->title; ?></td>
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