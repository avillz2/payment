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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Role</h3>
        <div class="card-tools">
            <a href="{{ route('role.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Role</a>
        </div>
    </div>
    <form method="POST" action="{{ route('role.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Role Name">

        </div>
        @forelse ($permissions as $permission )
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  name="permissions[]"  value="{{ $permission->name }}" id="invalidCheck">
            <label class="form-check-label" for="invalidCheck">
                {{ $permission->name }}
            </label>

        </div>
        @empty
        <p><i class="fas fa-folder-open"></i> No Record found</p>
        @endforelse

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Role</button>
        </div>
    </form>
</div>
@endsection





