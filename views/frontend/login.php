<?php require_once "views/frontend/header.php"; ?>
   <section class="hdl-mainmenu bg-main">
      <div class="container">
         <div class="row">
            <div class="col-12 col-md-12">
               <nav class="navbar navbar-expand-lg bg-main">
                  <div class="container-fluid">
                     <a class="navbar-brand d-block d-sm-none text-white" href="index.html">Truong Hoc Huu Store</a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li class="nav-item">
                              <a class="nav-link text-white" aria-current="page" href="index.html">Trang chủ</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link text-white" href="post_page.html">Giới thiệu</a>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 Thời trang nam
                              </a>
                              <ul class="dropdown-menu">
                                 <li><a class="dropdown-item text-main" href="product_category.html">Quần jean nam</a>
                                 </li>
                                 <li><a class="dropdown-item text-main" href="product_category.html">Áo thun nam </a>
                                 </li>
                                 <li><a class="dropdown-item text-main" href="product_category.html">Sơ mi nam</a></li>
                              </ul>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 Thời trang nữ
                              </a>
                              <ul class="dropdown-menu">
                                 <li><a class="dropdown-item text-main" href="product_category.html">Váy</a></li>
                                 <li><a class="dropdown-item text-main" href="product_category.html">Đầm</a>
                                 </li>
                                 <li><a class="dropdown-item text-main" href="product_category.html">Sơ mi nữ</a></li>
                              </ul>
                           </li>
                           <li class="nav-item">
                              <a href="post_topic.html" class="nav-link text-white">Bài viết</a>
                           </li>
                           <li class="nav-item">
                              <a href="contact.html" class="nav-link text-white">Liên hệ</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.html">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">
                  Đăng nhập
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <form action="login.html" method="post" name="logincustomer">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <p>Để gửi bình luận, liên hệ hay để mua hàng cần phải có tài khoản</p>
               </div>
               <div class="col-md-8">
                  <div class="mb-3">
                     <label for="username" class="text-main">Tên tài khoản (*)</label>
                     <input type="text" name="username" id="username" class="form-control"
                        placeholder="Nhập tài khoản đăng nhập" required>
                  </div>
                  <div class="mb-3">
                     <label for="password" class="text-main">Mật khẩu (*)</label>
                     <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu"
                        required>
                  </div>
                  <div class="mb-3">
                     <button class="btn btn-main" name="LOGIN">Đăng nhập</button>
                  </div>
                  <p><u class="text-main">Chú ý</u>: (*) Thông tin bắt buộc phải nhập</p>
               </div>
            </div>
         </div>
      </form>
   </section>
   <?php require_once "views/frontend/footer.php"; ?>