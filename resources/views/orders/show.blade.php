<x-layout>
    <ul class="list-group mt-3">
        <li class="list-group-item">Номер заказа: {{$order->id}}</li>
        <li class="list-group-item">ФИО покупателя: {{$order->customer_name}}</li>
        <li class="list-group-item">Товар: {{$order->product->name}}</li>
        <li class="list-group-item">Сумма: {{ $order->product->price * $order->quantity }} руб (x {{$order->quantity}})</li>
        <li class="list-group-item">Статус: {{$order->status}}</li>
        <li class="list-group-item">Дата: {{$order->created_at->format('d.m.Y H:i') }}</li>
    </ul>
    @if($order->status === 'новый')
        <form
            action="{{route('orders.update', $order->id)}}"
            method="post"
            onsubmit="return confirm('Хотите завершить заказ?')"
        >
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="выполнен">
            <button class="btn btn-primary my-1" type="submit">Выполнен</button>
        </form>
    @endif
</x-layout>
