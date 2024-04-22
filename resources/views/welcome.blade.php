<x-guest-layout>
    <body class="antialiased">
        <div class="py-12">
            @if (count($posts) > 0)
            @foreach($posts as $post)
            <a href="{{ route('post.show', $post->id) }}" class="block">
                <img
                  alt=""
                  src="{{ $post->image }}"
                  class="h-64 w-full object-cover sm:h-80 lg:h-96"
                />
              
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">{{ $post->title }}</h3>
              
              </a>
              @endforeach
              @endif
        </div>
    </body>
</x-guest-layout>
