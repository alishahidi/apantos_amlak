<div class="sidebar-container">
    <div class="sidebar-wrapper scroll-hide">
        <a href="<?= route("admin.index") ?>" class="sidebar-link">
            <i class="bi bi-house icon-position-fix-md ms-2 sidebar-icon"></i>
            <span>خانه</span>
        </a>
        <div class="sidebar-part-title fw-bold">بخش محتوی</div>
        <hr>
        <div class="sidebar-group-link <?= sidebarDropDownActive(["admin.category.index", "admin.category.create"], true) ?>">
            <div class="sidebar-dropdown-toggle">
                <i class="bi bi-book-fill icon-position-fix-md ms-2 sidebar-icon"></i>
                <span>دسته بندی ها</span>
                <i class="bi <?= sidebarAngle("admin.category.index") ?> icon-position-fix-md angle angle-drop-down"></i>
            </div>
            <div class="sidebar-dropdown">
                <a class="<?= sidebarLinkActive("admin.category.index") ?>" href="<?= route("admin.category.index") ?>">لیست</a>
                <a class="<?= sidebarLinkActive("admin.category.create") ?>" href="<?= route("admin.category.create") ?>">افزودن</a>
            </div>
        </div>
        <div class="sidebar-group-link <?= sidebarDropDownActive(["admin.news.index"], true) ?>">
            <div class="sidebar-dropdown-toggle">
                <i class="bi bi-newspaper icon-position-fix-md ms-2 sidebar-icon"></i>
                <span>اخبار</span>
                <i class="bi <?= sidebarAngle("admin.news.index") ?> icon-position-fix-md angle angle-drop-down"></i>
            </div>
            <div class="sidebar-dropdown">
                <a class="<?= sidebarLinkActive("admin.news.index") ?>" href="<?= route("admin.news.index") ?>">لیست</a>
                <a class="<?= sidebarLinkActive("admin.news.create") ?>" href="<?= route("admin.news.create") ?>">افزودن</a>
            </div>
        </div>
        <div class="sidebar-group-link <?= sidebarDropDownActive(["admin.ads.index"], true) ?>">
            <div class="sidebar-dropdown-toggle">
                <i class="bi bi-badge-ad-fill icon-position-fix-md ms-2 sidebar-icon"></i>
                <span>آگهی ها</span>
                <i class="bi <?= sidebarAngle("admin.ads.index") ?> icon-position-fix-md angle angle-drop-down"></i>
            </div>
            <div class="sidebar-dropdown">
                <a class="<?= sidebarLinkActive("admin.ads.index") ?>" href="<?= route("admin.ads.index") ?>">لیست</a>
                <a class="<?= sidebarLinkActive("admin.ads.create") ?>" href="<?= route("admin.ads.create") ?>">افزودن</a>
            </div>
        </div>
        <a href="<?= route("admin.slide.index") ?>" class="sidebar-link">
            <i class="bi bi-stack icon-position-fix-md ms-2 sidebar-icon"></i>
            <span>اسلاید ها</span>
        </a>
        <a href="<?= route("admin.comment.index") ?>" class="sidebar-link">
            <i class="bi bi-chat-left-dots icon-position-fix-md ms-2 sidebar-icon"></i>
            <span>کامنت ها</span>
        </a>
        <div class="sidebar-part-title fw-bold">بخش کاربران</div>
        <hr>
        <div class="sidebar-group-link">
            <div class="sidebar-dropdown-toggle">
                <i class="bi bi-people-fill icon-position-fix-md ms-2 sidebar-icon"></i>
                <span>کاربران</span>
                <i class="bi bi-chevron-left icon-position-fix-md angle angle-drop-down"></i>
            </div>
            <div class="sidebar-dropdown">
                <a class="<?= sidebarLinkActive("admin.user.index") ?>" href="<?= route("admin.user.index") ?>">لیست</a>
                <a class="<?= sidebarLinkActive("admin.ads.create") ?>" href="<?= route("admin.ads.create") ?>">افزودن</a>
            </div>
        </div>
        <div class="sidebar-part-title fw-bold">بخش تنظیمات</div>
        <hr>
        <div class="sidebar-group-link">
            <div class="sidebar-dropdown-toggle">
                <i class="bi bi-gear-fill icon-position-fix-md ms-2 sidebar-icon"></i>
                <span>تنظیمات منو</span>
                <i class="bi bi-chevron-left icon-position-fix-md angle angle-drop-down"></i>
            </div>
            <div class="sidebar-dropdown">
                <a href="#">منوی هدر</a>
                <a href="#">منوی فوتر</a>
            </div>
        </div>
    </div>
</div>