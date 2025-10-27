<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?=\yii\helpers\Url::home()?>" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >
                <li class="nav-item <?=in_array(Yii::$app->controller->id , ['news' , 'news-category']) ? 'menu-open' : ''?>">
                    <a class="nav-link <?=in_array(Yii::$app->controller->id , ['news' , 'news-category']) ? 'active' : ''?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Yangiliklar
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=\yii\helpers\Url::to(['news/index'])?>" class="nav-link <?=(\common\components\Helper::getControllerName()) == 'news' ? 'active' : ''?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Yangiliklar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=\yii\helpers\Url::to(['news-category/index'])?>" class="nav-link <?=(\common\components\Helper::getControllerName()) == 'news-category' ? 'active' : ''?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Yangilik Kategoriyalari</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?=in_array(Yii::$app->controller->id , ['product' , 'product-category']) ? 'menu-open' : ''?>">
                    <a class="nav-link <?=in_array(Yii::$app->controller->id , ['product' , 'product-category']) ? 'active' : ''?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Tovarlar
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=\yii\helpers\Url::to(['product/index'])?>" class="nav-link <?=(\common\components\Helper::getControllerName()) == 'product' ? 'active' : ''?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tovarlar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=\yii\helpers\Url::to(['product-category/index'])?>" class="nav-link <?=(\common\components\Helper::getControllerName()) == 'product-category' ? 'active' : ''?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tovar Kategoriyalari</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=\yii\helpers\Url::to(['client/index'])?>" class="nav-link <?=in_array(Yii::$app->controller->id , ['client']) ? 'active' : ''?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Mijozlar</p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>