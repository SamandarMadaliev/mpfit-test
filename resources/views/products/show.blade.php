<x-layout>
    <div class="w-100 my-3 card text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">
                {{$product->description}}
            </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Категория: {{$product->category->name}}</li>
                <li class="list-group-item">Цена: {{$product->price}} руб.</li>
            </ul>
        </div>
        <div class="card-footer text-end">
            <a href="{{route('products.edit', $product->id)}}" class="btn btn-secondary btn-sm my-1">Редактировать</a>
            <form
                action="{{route('products.destroy', $product->id) }}"
                method="POST"
                onsubmit="return confirm('Вы действительно хотите удалить этот продукт?')"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
            </form>
        </div>
    </div>
</x-layout>
