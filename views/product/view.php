<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>

                <ul class="catalog category-products">
                    <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
                </ul>

                <div class="brands_products"><!--brands_products-->
                    <h2>Brands</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                            <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                            <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                            <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                            <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                            <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                            <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                        </ul>
                    </div>
                </div><!--/brands_products-->

                <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well">
                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                        <b>$ 0</b> <b class="pull-right">$ 600</b>
                    </div>
                </div><!--/price-range-->

                <div class="shipping text-center"><!--shipping-->
                    <img src="images/home/shipping.jpg" alt="" />
                </div><!--/shipping-->

            </div>
        </div>

        <?php
        $mainImg = $product->getImage();
        $gallery = $product->getImages();
        ?>

        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="view-product">
                        <?= Html::img("@web/images/products/{$product->img}") ?>
                    </div>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">

                        <!-- Controls -->
                        <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                        <?php if ($product->new) : ?> <?= Html::img("@web/images/product-details/new.jpg", ['class' => 'newarrival']) ?> <?php endif; ?>
                        <h2><?= $product->name ?></h2>
                        <p>Web ID: <?= $product->id ?></p>
                        <img src="images/product-details/rating.png" alt="" />
                        <span>
									<span>US $<?= $product->price ?></span>
									<label>Quantity:</label>
									<input id="qty" type="text" value="3" />
									<a data-id="<?= $product->id ?>" href="" class="btn btn-fefault add-to-cart cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
								</span>
                        <p><b>Brand:</b><a href="<?= Url::to(['category/view', 'id' => $product->category->id]) ?>"> <?= $product->category->name ?> </a></p>
                        <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->

            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>

                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < count($hits); $i += 3) : ?>
                            <?php if (!isset($hits[$i])) break; ?>
                            <div class="item <?php if ($i == 0) echo "active"; ?>">
                                <?php for ($j = 0; $j < 3; $j ++) : ?>
                                    <?php if (!isset($hits[($i + $j)])) break 2; ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?= Html::img("@web/images/products/{$hits[($j + $i)]->img}") ?>
                                                    <h2>$<?= $hits[($j + $i)]->price ?></h2>
                                                    <a href="<?= Url::to(['product/view', 'id' => $hits[($j + $i)]->id]) ?>"><p><?= $hits[($j + $i)]->name ?></p></a>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div><!--/recommended_items-->

        </div>
    </div>
</div>
