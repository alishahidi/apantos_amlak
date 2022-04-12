<!doctype html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">
    <section class="app-bg"></section>
    <section class="app">
        <header class="header" id="header">
            @include('admin.layouts.header')
        </header>
        <section class="body-container d-flex">
            <aside id="sidebar" class="sidebar bg-soft-blue">
                @include('admin.layouts.sidebar')
            </aside>
            <section id="main-body" class="main-body p-3">
                @yield('content')
            </section>
        </section>
    </section>
    @include('admin.layouts.scripts')
    @yield('scripts')
</body>

</html>