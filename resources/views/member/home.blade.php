@extends('member.layout.auth')

@section('meta')
    @include('layouts.meta')
@endsection

@section('title')
  HOME | EMPLOYEES
@endsection

@section('head')
    @include('layouts.head')
@endsection

@section('theme')
    @include('layouts.theme')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.member-sidebar')
@endsection

@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    $employee_id  = Auth::guard('member')->user()->employee_id;

    $pro_completed = DB::table('projects')
    ->join('project_employee_linking', 'project_employee_linking.project_id', '=', 'projects.id')
    ->where('projects.work_states','Completed')
    ->where('project_employee_linking.employee_id',$employee_id)
    ->count();

    $pro_pending = DB::table('projects')
    ->join('project_employee_linking', 'project_employee_linking.project_id', '=', 'projects.id')
    ->whereIn('work_states',['In Progress'])
    ->where('project_employee_linking.employee_id',$employee_id)
    ->count();

    $pro_total = DB::table('projects')
    ->join('project_employee_linking', 'project_employee_linking.project_id', '=', 'projects.id')
    ->where('project_employee_linking.employee_id',$employee_id)
    ->count();

    $task_completed = DB::table('tasks')
    ->whereIN('status',['Completed'])
    ->where('employees_id',$employee_id)
    ->count();

    $task_pending = DB::table('tasks')
    ->whereIN('status',['Code Review','In-Progress','Planning','Pending'])
    ->where('employees_id',$employee_id)
    ->count();

    $task_total = DB::table('tasks')
    ->where('employees_id',$employee_id)
    ->count();

    $leaves = DB::table('leaves')
    ->where('employee_id',$employee_id)
    ->count();



@endphp


@section('content')

    <div class="container-fluid">

        <div class="row" style="margin-top: 100px; margin-left: 254px;">

            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">

                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Projects</p>
                                        <span class="badge bg-success" style="font-size: 12px;">Completed : <?php echo $pro_completed; ?></span><br>
                                        <span class="badge bg-warning" style="font-size: 12px;">Pending : <?php echo $pro_pending; ?></span><br>
                                        <span class="badge bg-primary" style="font-size: 12px;">Total : <?php echo $pro_total; ?></span>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bxs-folder-open font-size-24"></i>
                                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card mini-stats-wid">

                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Tasks</p>
                                        <span class="badge bg-success" style="font-size: 12px;">Completed : <?php echo $task_completed; ?></span><br>
                                        <span class="badge bg-warning" style="font-size: 12px;">Pending : <?php echo $task_pending; ?></span><br>
                                        <span class="badge bg-primary" style="font-size: 12px;">Total : <?php echo $task_total; ?></span>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bxs-folder-open font-size-24"></i>
                                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card mini-stats-wid">

                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Efforts</p>
                                        <span class="badge bg-success" style="font-size: 12px;">Weekly : <?php echo 2; ?></span><br>
                                        <span class="badge bg-warning" style="font-size: 12px;">Monthly : <?php echo 2; ?></span><br>
                                        <span class="badge bg-primary" style="font-size: 12px;">Total : <?php echo 2; ?></span>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bxs-folder-open font-size-24"></i>
                                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card mini-stats-wid">

                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Leaves</p>
                                        <span class="badge bg-success" style="font-size: 12px;"> <?php echo $leaves; ?></span><br>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bxs-folder-open font-size-24"></i>
                                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>


    </div>


@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')
    @include('layouts.script')

@endsection

