<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data"/>
            @csrf

            <x-form.input name="title" required/>
            <x-form.input name="slug" required/>
            <x-form.input name="thumbnail" type="file" required/>
            <x-form.textarea name="excerpt" required>{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body" required>{{ old('body') }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : ''  }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
