<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data"/>
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" required/>
            <x-form.input name="slug" :value="old('slug', $post->slug)"/>
            <x-form.input name="author" :value="old('author', $post->author->username)" />
            <p class="text-red-500 text-xs mt-2">{{ session('author username error') }}</p>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input
                        name="thumbnail"
                        type="file"
                        :value="old('thumbnail', $post->thumbnail)"
                    />
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl" width=100>
            </div>

            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''  }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            @if ((bool)(!$post->is_published))
                <x-form.field>
                    <x-form.label name="Publish post on main page?" />
                    <select name="is_published" id="is_published">
                        <option
                            value=1
                            {{ old('is_published', $post->is_published) == 1 ? 'selected' : ''  }}
                        >
                            Yes
                        </option>

                        <option
                            value=0
                            {{ old('is_published', $post->is_published) == 0 ? 'selected' : ''  }}
                        >
                            No
                        </option>
                    </select>

                    <x-form.error name="is_published" />
                </x-form.field>
            @else
                <x-form.error name="is_published" />
            @endif

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
