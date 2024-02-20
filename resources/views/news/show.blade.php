<x-app-layout :post='$post'
    :title='$post->title'
    :description='$post->getExcerpt()'
    :metaproduct='$metaproduct'>
    @section('header')
    <?php /*  @include('layouts.widgets.header') */ ?>
    <livewire:top-nav />
    @endsection
    @section('homesection')
    <x-news.news-detail :post="$post" :related="$related" :agent="$agent" />
    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>

    <div
    class="modal"
    role="dialog"
    tabindex="-1"
    x-show="isImageModalOpen"
    x-on:click.away="isImageModalOpen = false"
    x-cloak
    x-transition
  >
      <div class="model-inner">
        <div class="modal-header">
          <h3>Hello World</h3>
          <button aria-label="Close" x-on:click="isImageModalOpen=false">✖</button>
        </div>
        <p>
          Natus earum velit ab nobis eos. Sed et exercitationem voluptatum omnis
          dolor voluptates. Velit ut ipsam sunt ipsam nostrum. Maiores officia
          accusamus qui sapiente. Dolor qui vel placeat dolor nesciunt quo dolor
          dolores. Quo accusamus hic atque nisi minima.
        </p>
      </div>
  </div>

</x-app-layout>
