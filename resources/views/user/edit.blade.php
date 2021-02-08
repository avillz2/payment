@extends('layouts.app2')

@section('title')
user
@endsection

@section('content')
<section class="content">
    <div class="">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('img/avatar.jpg') }}" alt="">


                        </div>

                        {{-- <h3 class="profile-username text-center" style="text-transform: uppercase">{{ auth()->user()->name }} </h3>
                        {{--  <p class="text-muted text-center">{{ auth()->user()->role }}</p>  --}}
                        {{--;<p class="text-muted text-center">{{ auth()->user()->email }}</p>
                        <p class="text-muted text-center">{{ auth()->user()->phone }}</p> --}}

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div>

                            <div>
                                <form class="form-horizontal" method="POST" action="{{url('user',$user->id)}}">
                                    @csrf
                                    @method('PUT');
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name"  id="name" class="form-control " value="{{$user->name}}" required placeholder="Name">

                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" name="email"  id="email" class="form-control " value="{{$user->email}}" placeholder="E-mail Address">

                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{$user->phone}}" required>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label text-right">Role</label>
                                                <div class="col-sm-10">
                                                    <select name="role" class="custom-select">
                                                        @forelse ($allRoles as $allRole)
                                                        {{-- <option   @foreach($roles as $role) --}}

                                                    {{-- @endforeach --}}
                                                    <option   {{($roles == $allRole->name)? 'selected':''}}  >{{$allRole->name}}</option>
                                                        @empty
                                                        <p><i class="fas fa-folder-open"></i> No Record found</p>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>








                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Create New user</button>
                                                {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
