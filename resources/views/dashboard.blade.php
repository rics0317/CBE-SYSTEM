@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <div class="info-boxes">
        <div class="info-box">
            <i class='bx bxs-user'></i>
            <div>
                <h3>1,500</h3>
                <p>New Users</p>
            </div>
        </div>
        <div class="info-box">
            <i class='bx bxs-shopping-bag'></i>
            <div>
                <h3>150</h3>
                <p>New Orders</p>
            </div>
        </div>
        <div class="info-box">
            <i class='bx bxs-dollar-circle'></i>
            <div>
                <h3>$15,000</h3>
                <p>Total Sales</p>
            </div>
        </div>
    </div>
    <div class="chart-container">
        <h2>Sales Chart</h2>
        <div class="chart-placeholder"></div>
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ __("You're logged in!") }}
        </div>
    </div>
@endsection