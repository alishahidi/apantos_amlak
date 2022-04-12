<!DOCTYPE html>
<html lang="en">
<head>
    @include('auth.layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">
    <main>
        @yield('content')
    </main>
    @include('auth.layouts.scripts')
    @yield('scripts')
</body>
</html>