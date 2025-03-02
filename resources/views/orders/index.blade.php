<x-layout>
    <h1 class="text-center mb-3">Заказы</h1>
    <a href="{{route('orders.create')}}" class="btn btn-primary my-2"> Добавить новый заказ</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Дата создания</th>
            <th>ФИО покупателя</th>
            <th>Статус заказа</th>
            <th>Итоговая цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    {{ $order->product->price * $order->quantity }} руб.
                </td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}">Подробнее</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Нет заказов</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</x-layout>
