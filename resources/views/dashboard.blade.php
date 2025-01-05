@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .info-box {
            width: 18%;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .rectangle {
            width: 100%;
            height: 200px;
            background: linear-gradient(to bottom, white, #ffc61a);
            margin: 20px auto;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .chart-container {
            margin: 20px 0;
        }

        .calendar {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 80%;
            margin: auto;
        }

        .h1, h6 {
            font-size: 24px;
            font-weight: bold;
            justify-content: left;
        }
    </style>

    <div class="rectangle" style="display: flex; justify-content: space-between;">
        <h6 style="margin-left: 0; margin-bottom: 10px; margin-right: 399px;">WELCOME TO</h6>
        <h1 style="margin-left: -1000px; margin-bottom: -80px;">STUDENT DASHBOARD</h1>
        <img src="{{ asset('images/dep1.png') }}" alt="Description of image" class="img-fluid" style="max-height: 200px; margin-right: 400px;">
    </div>

    <div class="info-boxes d-flex flex-wrap justify-content-between">
        <div class="info-box">
            <h5>Approved</h5>
            <div class="progress">
                <div class="progress-bar bg-success" style="width: {{ ($approved / max($all, 1)) * 100 }}%"></div>
            </div>
            <p class="mt-2">{{ $approved }} Applications</p>
        </div>
        <div class="info-box">
            <h5>Pending</h5>
            <div class="progress">
                <div class="progress-bar bg-warning" style="width: {{ ($pending / max($all, 1)) * 100 }}%"></div>
            </div>
            <p class="mt-2">{{ $pending }} Applications</p>
        </div>
        <div class="info-box">
            <h5>Draft</h5>
            <div class="progress">
                <div class="progress-bar bg-secondary" style="width: {{ ($draft / max($all, 1)) * 100 }}%"></div>
            </div>
            <p class="mt-2">{{ $draft }} Applications</p>
        </div>
        <div class="info-box">
            <h5>All</h5>
            <div class="progress">
                <div class="progress-bar bg-info" style="width: 100%"></div>
            </div>
            <p class="mt-2">{{ $all }} Applications</p>
        </div>
        <div class="info-box">
            <h5>Rejected</h5>
            <div class="progress">
                <div class="progress-bar bg-danger" style="width: {{ ($rejected / max($all, 1)) * 100 }}%"></div>
            </div>
            <p class="mt-2">{{ $rejected }} Applications</p>
        </div>
        <div class="info-box">
            <h5>Archive</h5>
            <div class="progress">
                <div class="progress-bar bg-light" style="width: {{ ($archive / max($all, 1)) * 100 }}%"></div>
            </div>
            <p class="mt-2">{{ $archive }} Applications</p>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="chart-container" style="flex: 1;">
            <h2>Upcoming Appointments</h2>
            @if(count($appointments) > 0)
                <ul class="list-group">
                    @foreach($appointments as $appointment)
                        <li class="list-group-item">
                            {{ $appointment->title }} - {{ $appointment->date }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No upcoming appointments</p>
            @endif
        </div>

        <div class="calendar" style="background-color: #ffc107; padding: 10px; border-radius: 10px; width: 30%; margin-left: 20px;">
            <h3 style="font-size: 20px; font-weight: bold;">Calendar</h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                                <th>Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>17</td>
                                <td>18</td>
                                <td>19</td>
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>31</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection
