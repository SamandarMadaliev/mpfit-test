<x-layout>

    <h1 class="text-center mb-2">Добавить новый заказ</h1>
    <form class="w-100 mx-auto" action="{{route('orders.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">ФИО покупателя</label>
            <input name="customer_name" type="text" class="form-control" value="{{old('customer_name', '')}}" required/>
            @error('customer_name')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Дата создания</label>
            <input name="created_at" type="date" class="form-control" value="{{old('created_at', now()->format('Y-m-d'))}}" required/>
            @error('created_at')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Товар</label>
            <select class="form-control" name="product" required>
                @foreach($products as $product)
                    <option value="{{$product->id}}" @selected(old('product', '') === $product->id)>{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Количество</label>
            <input type="number" name="quantity" min="1" class="form-control" value="{{old('quantity', 1)}}" required>
            @error('quantity')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Статус заказа</label>
            <select name="status" class="form-control" required>
                <option value="новый" @selected(old('status', '') === 'новый')>Новый</option>
                <option value="выполнен" @selected(old('status', '') === 'выполнен')>Выполнен</option>
            </select>
            @error('status')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label>Комментарий</label>
            <textarea name="comment" class="form-control">{{old('comment', '')}}</textarea>
            @error('comment')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</x-layout>
