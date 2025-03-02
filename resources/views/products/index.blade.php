<x-layout>
    <ul>
        @foreach ($products as $product)
            <li>
                Название:<a href="{{route('products.edit', $product['id'])}}">{{$product['name']}}</a> <br>
                Цена: {{$product['price']}} <br>
                Категория: {{$product['category']}} <br><br>
            </li>
        @endforeach
    </ul>
</x-layout>
