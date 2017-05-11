<ul>
    @foreach ($posts as $post)
        @component('layouts.item_post', ['post' => $post])
        @endcomponent
    @endforeach
</ul>