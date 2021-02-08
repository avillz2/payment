@forelse ($allPermissions as $allPermission)

<div class="icheck-primary">
    <input type="checkbox" name="permissions[]" value="{{$allPermission->name}}" id="role"

    @foreach($permissions as $permission)

    @if($permission == $allPermission->name)
    {{'checked'}}
    @endif

    @endforeach

    <label for="role1">
        {{ $allPermission->name }}
    </label>
  </div>
  @empty
  <p><i class="fas fa-folder-open"></i> No Record found</p>
  @endforelse
