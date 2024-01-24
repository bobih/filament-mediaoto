
<div class="grid grid-cols-1 gap-4 md:mb-10" id="news-list">
    @foreach ($this->posts as $post)
    <x-news.news-item :post="$post" />
    @endforeach

    <div class="p-10 my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>

</div>
