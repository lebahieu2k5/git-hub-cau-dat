<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"
    xmlns="http://www.w3.org/1999/html">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <li class="sidebar-toggler-wrapper">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
    </li>
    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
    <li class="<?php if (Yii::$app->controller->id == 'site') echo '' ?>">
        <a href="<?= Yii::$app->urlManager->baseUrl ?>">
            <i class="icon-home"></i>
            <span class="title">Bảng tin</span>
        </a>
    </li>

    <li class="<?php if (Yii::$app->controller->id == 'datlichkham') echo 'open' ?>">
        <a href="<?= Yii::$app->urlManager->createUrl('datlichkham') ?>">
            <i class="icon-home"></i>
            <span class="title">Đặt lịch khám</span>
        </a>
    </li>

<!-- Quản lý tin tức -->
    <?php if (Yii::$app->user->can('news/index')): ?>
        <li class="<?php if (
                Yii::$app->controller->id == 'news' ||
                Yii::$app->controller->id == 'catnew' ||
                Yii::$app->controller->id == 'page'
        ) echo 'open' ?>">
            <a href="javascript:;">
                <i class="icon-pencil"></i>
                <span class="title">Quản lý tin tức</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" <?php if (Yii::$app->controller->id == 'news' || Yii::$app->controller->id == 'catnew' || Yii::$app->controller->id == 'page') echo 'style="display:block"' ?>>
                <?php if (Yii::$app->user->can('catnew/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'catnew') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('catnew') ?>">
                            <i class="icon-bar-chart"></i>
                            Chuyên mục tin tức</a>
                    </li>
                <?php endif; ?>
                <?php if (Yii::$app->user->can('news/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'news') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('news') ?>">
                            <i class="icon-bulb"></i>
                            Quản lý tin tức</a>
                    </li>
                <?php endif; ?>
                <?php if (Yii::$app->user->can('page/index')): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'page') echo 'active' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('page') ?>">
                            <i class="icon-bulb"></i>
                            Quản lý trang</a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>

<!-- Quản lý danh mục -->
    <li class="<?php if (
            Yii::$app->controller->id == 'chuyenkhoa' ||
            yii::$app->controller->id == 'nhansu' ||
            Yii::$app->controller->id == 'contact'
    ) echo 'open' ?>">
        <a href="javascript:void(0);">
            <i class="icon-pencil"></i>
            <span class="title">Quản lý danh mục</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu" <?php if (
            Yii::$app->controller->id == 'chuyenkhoa' ||
            yii::$app->controller->id == 'nhansu' ||
            Yii::$app->controller->id == 'contact'
        ) echo 'style="display: block"'?>>
            <?php if (Yii::$app->user->can('chuyenkhoa/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'chuyenkhoa') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('chuyenkhoa') ?>">
                    <i class="icon-pencil"></i>
                    Danh mục chuyên khoa
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('nhansu/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'nhansu') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('nhansu') ?>">
                    <i class="icon-pencil"></i>
                    <span class="title">Quản lý nhân sự</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('contact/index')): ?>
            <li class="<?php if (yii::$app->controller->id == 'contact') echo 'active'?>">
                <a href="<?= Yii::$app->urlManager->createUrl('contact') ?>">
                    <i class="icon-pencil"></i>
                    <span class="title">Quản lý contact</span>
                </a>
            </li>
            <?php endif; ?>

        </ul>
    </li>

<!--  Quản lý giao diện  -->
        <li class="<?php if (
        Yii::$app->controller->id == 'album' ||
        Yii::$app->controller->id == 'slides' ||
        Yii::$app->controller->id == 'menu' ||
        Yii::$app->controller->id == 'picture' ||
        Yii::$app->controller->id == 'comment'
    ) echo '' ?>">
        <a href="javascript:;">
            <i class="icon-pencil"></i>
            <span class="title">Quản lý giao diện</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu" <?php if (
            Yii::$app->controller->id == 'album' ||
            Yii::$app->controller->id == 'slides' ||
            Yii::$app->controller->id == 'menu' ||
            Yii::$app->controller->id == 'picture' ||
            Yii::$app->controller->id == 'comment'
        ) echo 'style="display:block"' ?>>
            <?php if (Yii::$app->user->can('album/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'album') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('album') ?>">
                    <i class="icon-pencil"></i>
                    Quản lý album
                </a>
            </li><?php endif; ?>

            <?php if (Yii::$app->user->can('comment/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'comment') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('comment') ?>">
                    <i class="icon-pencil"></i>
                    <span class="title">Quản lý comment</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('slides/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'slides') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('slides') ?>">
                    <i class="icon-pencil"></i>
                    Quản lý slides
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('video/index')): ?>
            <li class="<?php if (yii::$app->controller->id == 'video') echo 'active'?>">
                <a href="<?= Yii::$app->urlManager->createUrl('video') ?>">
                    <i class="icon-pencil"></i>
                    <span class="title">Quản lý video</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('partner/index')): ?>
            <li class="<?php if (yii::$app->controller->id == 'partner') echo 'active'?>">
                <a href="<?= Yii::$app->urlManager->createUrl('partner') ?>">
                    <i class="icon-pencil"></i>
                    <span class="title">Quản lý partner</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('menu/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'menu') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('menu') ?>">
                    <i class="icon-pencil"></i>
                    Quản lý menu
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('picture/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'picture') echo 'active' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('picture') ?>">
                    <i class="icon-pencil"></i>
                    Quản lý picture
                </a>
            </li>
            <?php endif; ?>

            <?php if (Yii::$app->user->can('configure/index')): ?>
            <li class="<?php if (Yii::$app->controller->id == 'configure' && Yii::$app->controller->action->id == 'index') echo 'active' ?>">
                <a href="<?php echo Yii::$app->urlManager->createUrl('configure') ?>">
                    <i class="icon-bar-chart"></i>
                    Cấu hình Thông số Website</a>
            </li>
            <?php endif; ?>
        </ul>
    </li>

    <!---------------------------------------------------------------------------------------------------------------------------------------->
    <?php if (
            Yii::$app->user->can('rbac/authorization') ||
            Yii::$app->user->identity->username == 'Superadmin'
        ): ?>
        <li class="<?php if (
                Yii::$app->controller->id == 'rbac' ||
                Yii::$app->controller->id == 'log'
        ) echo 'open' ?>">
            <a href="javascript:;">
                <i class="icon-user"></i>
                <span class="title">Quản lý phân quyền</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" <?php if (
                    Yii::$app->controller->id == 'rbac' ||
                    Yii::$app->controller->id == 'rbac' ||
                    Yii::$app->controller->id == 'log' ||
                    Yii::$app->user->identity->username == 'Superadmin'
            ) echo '' ?>>

                <?php if (Yii::$app->user->can('rbac/signup') || Yii::$app->user->identity->username == 'Superadmin'): ?>
                    <li class="<?php if (Yii::$app->controller->action->id == 'signup') echo 'open' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('rbac/signup') ?>">
                            <i class="icon-bar-chart"></i>
                            Tạo tài khoản</a>
                    </li>
                <?php endif; ?>

                <?php if (Yii::$app->user->can('rbac/authorization') || Yii::$app->user->identity->username == 'Superadmin'): ?>
                    <li class="<?php if (Yii::$app->controller->action->id == 'authorization') echo 'open' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('rbac/authorization') ?>">
                            <i class="icon-bar-chart"></i>
                            Cập nhật quyền theo vai trò</a>
                    </li>
                <?php endif; ?>
                <?php if (Yii::$app->user->can('rbac/authorization') || Yii::$app->user->identity->username == 'Superadmin'): ?>
                    <li class="<?php if (Yii::$app->controller->action->id == 'user_role') echo 'open' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('rbac/user_role') ?>">
                            <i class="icon-bulb"></i>
                            Phân vai trò người dùng</a>
                    </li>
                <?php endif; ?>

                <?php if (Yii::$app->user->can('admin/index') || Yii::$app->user->identity->username == 'Superadmin'): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'admin') echo 'open' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('admin/index') ?>">
                            <i class="icon-bulb"></i>
                            Danh sách người dùng</a>
                    </li>
                <?php endif; ?>
                <?php if (Yii::$app->user->can('log/index') || Yii::$app->user->identity->username == 'Superadmin'): ?>
                    <li class="<?php if (Yii::$app->controller->id == 'log') echo 'open' ?>">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('log/index') ?>">
                            <i class="icon-bar-chart"></i>
                            System Logs</a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
</ul>