<x-layout>
    <h1 class="text-center mb-2">Изменить продукт</h1>
    <form class="w-100 mx-auto" action="{{route('products.update', $product->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input name="name" type="text" class="form-control" value="{{$product->name}}" required/>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Категория</label>
            <select name="category" class="form-control" required>
                @forelse($categories as $category)
                    <option value="{{$category->id}}" @selected($category->id === $product->category_id)>{{ucfirst($category->name)}}</option>
                @empty
                    <option value="1">Легкий</option>
                    <option value="2">Хрупкий</option>
                    <option value="3">Тяжелый</option>
                @endforelse
            </select>
            @error('category')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control">{{$product->description}}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Цена</label>
            <input type="number" name="price" step="0.1" class="form-control" value="{{$product->price}}" required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</x-layout>
