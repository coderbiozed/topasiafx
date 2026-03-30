<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TopAsia Blog')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    @stack('styles')
</head>
<body>
    <div class="background-orchestrator">
        <div class="blob blob-blue"></div>
        <div class="blob blob-red"></div>
        <div class="blob blob-yellow"></div>
    </div>

    <nav class="glass-nav">
        <div class="nav-container">
            <a href="{{ route('blog.index') }}" class="nav-brand">TopAsia<span class="text-gradient">Blog</span></a>
            <div class="nav-links">
                <a href="{{ route('blog.index') }}" class="nav-link">Home</a>
                <a href="#" class="nav-link">Categories</a>
                <a href="#" class="nav-link glass-btn">Subscribe</a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="glass-footer">
        <div class="footer-content">
            <p>&copy; {{ date('Y') }} TopAsia Blog. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
