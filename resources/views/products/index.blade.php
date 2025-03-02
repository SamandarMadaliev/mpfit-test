<x-layout>
    <a href="{{route('products.create')}}" class="btn btn-primary mt-1">Добавить товар</a>
    <div class="my-2 row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
        @foreach ($products as $product)
                <div class="card my-1">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">
                            Цена: {{$product->price}} руб.<br>
                            Категория: {{$product->category->name}} <br>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-primary btn-sm">Просмотр</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
