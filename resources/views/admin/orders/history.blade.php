@extends('layouts.admin')

@section('title')
orders
    
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                             <h4>
                                  Orders History
                                 <a href="{{'orders'}}" class="btn btn-warning float-right"> New Order </a>

                             </h4>
        
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item )
                                        <tr>
                                            <td>{{ $item->tracking_no}}</td>
                                            <td>{{ $item->total_price}}</td>
                                            <td>{{ $item->status == '0' ? 'pending' : 'completed'}}</td>
                                            <td>
                                                <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">view</a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                
                            </table>
        
                        </div>
                    </div>
                
            

        </div>
    </div>
</div>
   
@endsection