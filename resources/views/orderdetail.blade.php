@extends('master')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Order Details</h2>
                <a href="/myorders" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Orders
                </a>
            </div>

            <div class="row">
                <!-- Order Summary -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="text-muted mb-2">Order Information</h6>
                                <p class="mb-1"><strong>Order ID:</strong> #{{$order->id}}</p>
                                <p class="mb-1"><strong>Date:</strong> {{$order->created_at->format('d M Y, h:i A')}}</p>
                                <p class="mb-1"><strong>Status:</strong> 
                                    <span class="badge bg-{{$order->status == 'delivered' ? 'success' : ($order->status == 'processing' ? 'warning' : 'info')}}">
                                        {{ucfirst($order->status)}}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-2">Delivery Address</h6>
                                <p class="mb-1">{{$order->address}}</p>
                                <p class="mb-1">{{$order->phone}}</p>
                            </div>
                            <div>
                                <h6 class="text-muted mb-2">Payment Details</h6>
                                <p class="mb-1"><strong>Payment Method:</strong> {{$order->payment_method}}</p>
                                <p class="mb-1"><strong>Payment Status:</strong> 
                                    <span class="badge bg-{{$order->payment_status == 'paid' ? 'success' : 'warning'}}">
                                        {{ucfirst($order->payment_status)}}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Order Items</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="border-0">Product</th>
                                            <th class="border-0">Price</th>
                                            <th class="border-0">Quantity</th>
                                            <th class="border-0 text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{$item->product->gallery}}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                    <div class="ms-3">
                                                        <h6 class="mb-0">{{$item->product->name}}</h6>
                                                        <small class="text-muted">{{$item->product->description}}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">₹{{$item->price}}</td>
                                            <td class="align-middle">{{$item->quantity}}</td>
                                            <td class="align-middle text-end">₹{{$item->price * $item->quantity}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-light">
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                            <td class="text-end">₹{{$order->items->sum(function($item) { return $item->price * $item->quantity; })}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Shipping:</strong></td>
                                            <td class="text-end">Free</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                            <td class="text-end"><strong>₹{{$order->items->sum(function($item) { return $item->price * $item->quantity; })}}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    border-radius: 10px;
}

.card-header {
    border-bottom: 1px solid rgba(0,0,0,0.1);
    background-color: #f8f9fa;
    border-radius: 10px 10px 0 0 !important;
}

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