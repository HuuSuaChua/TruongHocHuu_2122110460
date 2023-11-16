<div class="product-item border ">
                           <div class="product-item-image w-auto h-150 img-size-100 ">
                              <a href="index.php?option=product&slug=<?= $product->slug;?>">
                                 <img  src="public/images/product/<?= $product->image;?>" class="img-fluid" alt="<?= $product->image;?>"
                                    id="img1">
                                 <img  class="img-fluid" src="public/images/product/<?= $product->image;?>" alt="<?= $product->image;?>"
                                    id="img2">
                              </a>
                           </div>
                           <h2 class="product-item-name text-main text-center w-auto h-25 fs-5 py-1">
                              <a  href="index.php?option=product&slug=<?= $product->slug;?>"><?= $product->name;?></a>
                           </h2>
                           <h3 class="product-item-price fs-6 p-2 d-flex">
                              <div class="flex-fill text-danger"><del> <?= number_format($product->price);?>đ</del></div>
                              <div class="flex-fill text-end text-main "> <?= number_format($product->pricesale);?>đ</div>
                           </h3>
                        </div>