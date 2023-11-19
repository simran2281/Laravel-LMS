@extends('layout.layout')
@section("title", "Users")
@section('content')
<br>
<div class="custom-shape-divider-bottom-1648996474">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>
<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title">Users <span>List</span></h4>
                        </div>

                        <div class="col-sm-9 col-xs-12 text-right">
                                <form class="" type="get" action="">
                                    <div class="btn_group d-flex flew-row align-items-center justify-content-start">
                                        <input class="form-control" style="margin-right: 1rem;" type="search" name="search" placeholder="Search Users By Name or Staff ID" value="{{$search}}"> 
                                        <button class="btn btn-outline-success my-2 pl-2" type="submit">Search</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Staff ID</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->staff_id }}</td>
                                <td>{{ $user->phone_no }}</td>
                                <td>
                                    <ul class="d-inline-flex action-list align-items-center">
                                        <li><a href="{{ url('admin/users/'.$user->id.'/edit') }}" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                        <li>
                                            <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn.sm trash"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                    </ul>
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
    <style>
        .demo{ font-family: 'Noto Sans', sans-serif; }
        .panel{
            background: #4723D9;
            padding: 0;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 0 5px rgba(0,0,0,0.05),0 0 0 10px rgba(0,0,0,0.05);
        }
        .panel .panel-heading{
            width: 98%;
            padding: 20px 15px;
            border-radius: 10px 10px 0 0;
            margin: 0;
        }
        .panel .panel-heading .title{
            color: #fff;
            font-size: 28px;
            padding-top: 10px;
            font-weight: 500;
            text-transform: capitalize;
            line-height: 40px;
            margin: 0;
        }
        .panel .panel-heading .btn{
            color: rgba(255,255,255,1);
            background: transparent;
            font-size: 16px;
            text-transform: capitalize;
            border: 2px solid #fff;
            border-radius: 50px;
            transition: all 0.3s ease 0s;
        }
        .panel .panel-heading .btn:hover{
            color:#4723D9;
            background: #fff;
        }
        .panel .panel-heading .form-control{
            color: #fff;
            background-color: transparent;
            height: 40px;
            border: 2px solid #fff;
            border-radius: 20px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }
       
        .panel .panel-heading .form-control::placeholder{
            color: rgba(255,255,255,0.5);
            font-size: 15px;
            font-weight: 500;
        }
        .panel .panel-body{ padding: 0; }
        .panel .panel-body .table thead tr th{
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            padding: 12px;
            border: none;
        }
        .panel .panel-body .table tbody tr td{
            color: #fff;
            font-size: 15px;
            padding: 10px 12px;
            vertical-align: middle;
            border: none;
        }
        .panel .panel-body .table tbody tr:nth-child(even){ background-color: rgba(255,255,255,0.05); }
        .panel .panel-body .table tbody .action-list{
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .panel .panel-body .table tbody .action-list li{
            display: inline-block;
            margin: 0 5px;
        }
        .panel .panel-body .table tbody .action-list li a{
            color: #fff;
            font-size: 24px;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }
        
        .panel .panel-body .table tbody .action-list li .trash{
            color: #fff;
            font-size: 24px;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }
        



        
        @media only screen and (max-width:767px){
            .panel .panel-heading .title{
                text-align: center;
                margin: 0 0 10px;
            }
            .panel .panel-heading .btn_group{ text-align: center; }
        }
        .custom-shape-divider-bottom-1648996474 {
            z-index: -3;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1648996474 svg {
            position: relative;
            display: block;
            width: calc(168% + 1.3px);
            height: 346px;
        }

        .custom-shape-divider-bottom-1648996474 .shape-fill {
            fill: #4723D9;
        }
    </style>

@endsection  
