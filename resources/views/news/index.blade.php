<x-app-layout title="Berita Otomotif dan berita rumah Terbaru  | mediaoto.id" description="Mediaoto.id menampilkan semua berita terbaru dari otomotif, properti. mobil dan rumah di jual,update dan harga terbaru yang akan datang">
    @section('header')
        @include('layouts.widgets.header')
    @endsection
    @section('homesection')
    <div id="news" class="-mt-20 mb-20"></div>
       <x-news.news-list :posts="$posts" :categories="$categories" />
    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>

</x-app-layout>
