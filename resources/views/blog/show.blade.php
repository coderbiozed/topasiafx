@extends('layouts.blog')

@section('title', $post->meta_title ?? $post->title . ' - TopAsia Blog')

@section('content')
<div class="container pb-5">
    
    <div class="post-header-glass">
        @if($post->categories->count() > 0)
            <div class="post-tags mb-3">
                @foreach($post->categories as $category)
                    <span class="glass-badge category">{{ $category->name }}</span>
                @endforeach
            </div>
        @endif
        
        <h1 class="single-post-title">{{ $post->title }}</h1>
        
        <div class="single-post-meta">
            <div class="author-info">
                <div class="author-avatar">{{ substr($post->user->name ?? 'A', 0, 1) }}</div>
                <div class="author-details">
                    <span class="author-name">{{ $post->user ? $post->user->name : 'Unknown' }}</span>
                    <span class="post-date">{{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }} • {{ $post->reading_time ?? '5' }} min read</span>
                </div>
            </div>
        </div>
    </div>

    @if($post->featured_image)
        <div class="single-post-image-wrapper glass-card mb-5">
            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="single-post-image">
        </div>
    @endif

    <div class="single-post-body">
        <article class="glass-article prose">
            {!! $post->content !!}
        </article>
        
        @if($post->tags && $post->tags->count() > 0)
            <div class="tags-section mt-5">
                <h4 class="mb-3" style="color: var(--text-muted); font-weight: 500;">Related Tags</h4>
                <div class="post-tags">
                    @foreach($post->tags as $tag)
                        <span class="glass-badge tag">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endif
        
        <div class="back-navigation mt-5 text-center">
            <a href="{{ route('blog.index') }}" class="glass-btn variant-blue">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                    <path d="M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to Articles
            </a>
        </div>
    </div>
</div>
@endsection
