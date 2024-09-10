@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        @if (Auth::user()->role == 'super_admin')
            <p>Welcome, Super Admin!</p>
        @elseif (Auth::user()->role == 'admin')
            <p>Welcome, Admin!</p>
        @elseif (Auth::user()->role == 'seller')
            <p>Welcome, Seller!</p>
        @else
            <p>Welcome, User!</p>
        @endif
    </div>
@endsection
