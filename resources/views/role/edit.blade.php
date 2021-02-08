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

<div class="row">
    <!-- right column -->
      <div class="col-md-7 mx-auto">





          <form class="form-horizontal" method="POST" action="{{url('role',$role->id)}}">
            @csrf
            @method('PUT');
            <div class="card">
                      <div class="card-header">
                        All Permissions
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                      <div class="form-group ">
                        @forelse ($allPermissions as $allPermission)

                                            <div class="icheck-primary">
                                                <input type="checkbox" name="permissions[]" value="{{$allPermission->name}}" id="role{{$allPermission->id}}"

                                                @foreach($permissions as $permission)
                                                    {{($permission == $allPermission->name)? 'checked':''}}
                                                @endforeach
                                                >
                                                <label for="role1">
                                                    {{ $allPermission->name }}
                                                </label>
                                            </div>
                                            @empty
                                            <p><i class="fas fa-folder-open"></i> No Record found</p>
                                            @endforelse

                                                    </div>
                      <div class="col-sm-8 mx-auto"><button type="submit" class="btn btn-primary col-sm-12">Update Permission</button></div>
                  </div>
                    <!-- /.card-body -->
                </div>
            <!-- Role Creation -->
          </form>
          <!-- form end -->
      </div>
    </div>
@endsection





