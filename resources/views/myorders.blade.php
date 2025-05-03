@extends('master')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">My Orders</h2>
            
            @if(isset($orders) && count($orders) > 0)
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0">Order ID</th>
                                        <th class="border-0">Product</th>
                                        <th class="border-0">Date</th>
                                        <th class="border-0">Total Amount</th>
                                        <th class="border-0">Status</th>
                                        <th class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td class="align-middle">#{{$order->id}}</td>
                                        <td class="align-middle">
                                            @foreach($order->items as $item)
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="{{$item->product->gallery}}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                                <div class="ms-2">
                                                    <h6 class="mb-0">{{$item->product_name}}</h6>
                                                    <small class="text-muted">Quantity: {{$item->quantity}}</small>
                                                </div>
                                            </div>
                                            @endforeach
                                        </td>
                                        <td class="align-middle">{{$order->created_at->format('d M Y')}}</td>
                                        <td class="align-middle">₹{{$order->items->sum(function($item) { return $item->price * $item->quantity; })}}</td>
                                        <td class="align-middle">
                                            <span class="badge bg-{{$order->status == 'delivered' ? 'success' : ($order->status == 'processing' ? 'warning' : 'info')}}">
                                                {{ucfirst($order->status)}}
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="orderdetail/{{$order->id}}" class="btn btn-sm btn-primary">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-shopping-bag fa-3x text-muted"></i>
                    </div>
                    <h4 class="text-muted">No Orders Found</h4>
                    <p class="text-muted">You haven't placed any orders yet.</p>
                    <a href="/" class="btn btn-primary mt-3">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.table th {
    font-weight: 600;
    color: #495057;
}

.table td {
    color: #6c757d;
}

.badge {
    padding: 0.5em 0.8em;
    font-weight: 500;
}

.btn-sm {
    padding: 0.4rem 0.8rem;
    font-size: 0.875rem;
}

.table-hover tbody tr:hover {
    background-color: rgba(0,123,255,0.05);
}

@media (max-width: 768px) {
    .table-responsive {
        border: 0;
    }
    
    .table thead {
        display: none;
    }
    
    .table tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }
    
    .table tbody td {
        display: block;
        text-align: right;
        padding: 0.75rem;
        border: none;
    }
    
    .table tbody td::before {
        content: attr(data-label);
        float: left;
        font-weight: 600;
        color: #495057;
    }
}
</style>

@endsection