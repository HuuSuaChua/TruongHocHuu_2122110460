<?php
   use App\Models\Product;
   use App\Models\Category; 
   use App\Models\Brand;
   $list = Product::where('product.status', '!=', '0')
   ->join('category', 'category.id', '=', 'product.category_id')
   ->join('brand', 'brand.id', '=', 'product.brand_id')
   ->orderBy('product.created_at', 'desc')
   ->select('product.name as nameproduct', 'product.image', 'product.status', 'product.id', 'category.name as catename', 'brand.name as brandname')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <form action="" method="post">
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả sản phẩm</h1>
                     </div>
                     <div class="col-sm-12 mt-2 mb-2">
                        <a href="index.php?option=product&cat=create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
                     </div>
                     <div class="col-md-6 text-left">
                        <a class="text-success" href="index.php?option=product">Tất cả</a>
                        <a class="text-danger" href="index.php?option=product&cat=trash">Thùng rác</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="card">
                  <div class="card-header">
                     <select name="" id="" class="form-control d-inline" style="width:100px;">
                        <option value="">Xoá</option>
                     </select>
                     <button class="btn btn-sm btn-success">Áp dụng</button>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered" id="mytable">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Tên danh mục</th>
                              <th>Tên thương hiệu</th>
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
                                 <img class="img-fluid" src="../public/images/product/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                              </td>
                              <td>
                                 <div class="name">
                                 <?= $item->nameproduct; ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if($item->status == 1): ?>
                                    <a class="text-success btn-xs" href="index.php?option=product&cat=status&id=<?= $item->id;?>">
                                    <i class="fas fa-toggle-on"></i>
                                    Hiện</a> |
                                    <?php else: ?>
                                    <a class="text-danger btn-xs" href="index.php?option=product&cat=status&id=<?= $item->id;?>">
                                    <i class="fas fa-toggle-on"></i>
                                    Ẩn</a> |
                                    <?php endif; ?>
                                    <a class="text-warning btn-xs" href="index.php?option=product&cat=edit&id=<?= $item->id;?>">
                                    <i class="fas fa-edit"></i>
                                    Chỉnh sửa</a> |
                                    <a class="text-warning btn-xs"  href="index.php?option=product&cat=show&id=<?= $item->id;?>">
                                    <i class="fas fa-eye"></i>
                                    Chi tiết</a> |
                                    <a class="text-danger btn-xs" href="index.php?option=product&cat=delete&id=<?= $item->id;?>">
                                    <i class="fas fa-trash"></i>
                                    Xoá</a>
                                 </div>
                              </td>
                              <td> <?= $item->catename; ?></td>
                              <td><?= $item->brandname; ?></td>
                           </tr>
                           <?php endforeach; ?>
                              <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </form>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>