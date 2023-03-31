<x-base-layout>
    {{--  @include('pages.flash-message') --}}
    @foreach ($roles as $role)
        <!--begin::Card header-->
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#role_permission_{{ $role->name }}" aria-expanded="true" aria-controls="role_permission_{{ $role->name }}">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">{{ $role->name }} Permissions</h3>
                </div>
            </div>
            <div  class="collapse show" id="role_permission_{{ $role->name }}">
                <form action="{{ route('roles.update', $role) }}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="card mb-4">
                        <!-- <div class="card-header" id="{{ $role->name }}">
                        <h3 class="card-title fw-bolder m-0">{{ $role->name }} Permissions</h3>
                        </div> -->
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <?php
                                        $permission_found = false;
                                        if (isset($role)) {
                                            $permission_found = $role->hasPermissionTo($permission->name);
                                        }
                                        ?>
                                        <div class="col-lg-3 mt-3">
                                            <div class="form-check">
                                                <input {{ $role->name == 'Admin' ? 'disabled' : '' }} name="permissions[]"
                                                    type="checkbox" class="form-check-input" value="{{ $permission->id }}"
                                                    id="permission_{{ $role->id }}_{{ $permission->id }}"
                                                    {{ $permission_found ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="permission_{{ $role->id }}_{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @can('add_roles', 'add_roles')
                                @if ($role->name != 'Admin')
                                    <div class="row text-right">
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </div>
                                @endif
                            @endcan
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</x-base-layout>
