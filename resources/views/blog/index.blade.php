@extends('layouts.blog')

@section('title', 'Insights & News - TopAsia Blog')

@section('content')
<div class="hero-section">
    <div class="hero-content text-center">
        <h1 class="hero-title">Welcome to <span class="text-gradient">TopAsia</span></h1>
        <p class="hero-subtitle">Discover the latest insights, innovations, and news in a glass frame.</p>
    </div>
</div>

<div class="container">
    <div class="section-title-wrapper">
        <h2 class="section-title">Latest Articles</h2>
    </div>

    @if($posts->count() > 0)
        <div class="post-grid">
            @foreach($posts as $post)
                <article class="glass-card post-card">
                    <div class="post-image-wrapper">
                        @if($post->featured_image)
                            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="post-image">
                        @else
                            <div class="post-image-placeholder">
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="post-category-badge">
                            @if($post->categories->count() > 0)
                                {{ $post->categories->first()->name }}
                            @else
                                Uncategorized
                            @endif
                        </div>
                    </div>
                    
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            <span class="post-author">By {{ $post->user ? $post->user->name : 'Unknown' }}</span>
                        </div>
                        
                        <h3 class="post-title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                        <p class="post-excerpt">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}</p>
                        
                        <div class="post-footer">
                            <a href="{{ route('blog.show', $post->slug) }}" class="read-more">
                                Read Article 
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pagination-wrapper mt-5">
            {{ $posts->links() }}
        </div>
    @else
        <div class="glass-card blank-state">
            <h3 class="text-gradient">No Posts Yet</h3>
            <p>Check back later for exciting insights!</p>
        </div>
    @endif
</div>
@endsection
