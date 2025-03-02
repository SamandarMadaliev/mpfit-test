<?php

namespace App;

enum OrderStatus: string
{
    case NewOrderStatus = 'новый';
    case CompletedOrderStatus = 'выполнен';
}
