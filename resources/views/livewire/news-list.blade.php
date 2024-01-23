
<div id="news-list">
    @foreach ($this->posts as $post)
    <x-news.news-item :post="$post" />
    @endforeach
    <div class="p-10 my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
