<div>
    @include('layouts.widgets.header')
    @if (session()->has('scroll'))
        @script
            <script>
                console.log('{{ session('scroll') }}');
                document.getElementById('{{ session('scroll') }}').scrollIntoView();
            </script>
        @endscript
    @endif
</div>
