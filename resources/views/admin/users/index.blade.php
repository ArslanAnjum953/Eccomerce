@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Registered User</h4>
           </div>
        <div class="card-body" >
          <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                <a href="{{ url('view-user/'.$item->id) }}" class="btn btn-primary">view</a>
                   
                </td>
                  
                </tr>      
                <br>
                
                @endforeach
                 
            </tbody>
              </table>
          </div>
        </div>
    </div>
@endsection