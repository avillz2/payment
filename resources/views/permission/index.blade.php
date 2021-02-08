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

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permission Table</h3>

        <div class="card-tools">
            <a href="{{ route('permission.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create new permission</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td>
                            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-sm btn-warning">Edit Permission</a>
                            <form action="{{route('permission.destroy',$permission->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Danger</button>
                        </form>
                        </td>
                    </tr>
                @empty
                    <tr>No Result Found</tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection





