@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-sm-12">
                                                <div class="page-title-box">
            <div class="row">
                <div class="col">

                </div><!--end col-->
                <div class="col-auto align-self-center">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastone</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>

                    </ol>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<!-- end page title end breadcrumb -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Roles Table</h3>
        <div class="card-tools">
            <a href="{{ route('user.create') }} " class="btn btn-primary"><i class="fas fa-shield-alt"></i> Add new User</a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @forelse ($users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach ($user->roles as $role )
                                <button class="btn btn-warning" role="button"><i class="fas fa-shield-alt"></i> {{ $role->name }}</button>
                            @endforeach
                        </td>
                        <td>{{ $user->email  }}</td>
                         <td><span class="tag tag-success">{{ $user->created_at }}</span></td>
                         <td>
                            <a href="{{ route('user.edit', $user->id ) }}" class="btn btn-info">EDit</a>

                            <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Danger</button>
                        </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><i class="fas fa-folder-open"></i> No Record found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection





