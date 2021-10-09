{{-- <h1>you are admin</h1> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h2> Welcome {{ $logged_user_name }}</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="bg-dark alert text-center text-white">
                        <h4>Total User: {{ $total_user }}</h4>
                    </div>
                    {{-- {{ __('You are logged in!') }} --}}
                    <table class="table table-dark">
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Logged time</th>
                        <tbody>
                            @foreach ($users as $index=>$user_info )
                            <tr>
                                <td>{{ $users->firstitem()+$index }}</td>
                                <td>{{ $user_info->name }}</td>
                                <td>{{ $user_info->email }}</td>
                                <td>{{ $user_info->created_at->format('d/m/y h:i:s') }}</td>
                                <td>{{ $user_info->created_at->diffForHumans() }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Add user</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/user/insert') }}" method="POST">
                        @csrf
                        <div class="mb-3 form-group">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">User email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">User Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option value="">---Select role---</option>
                                <option value="1">Admin</option>
                                <option value="2">Customer</option>
                                <option value="3">Shopkeeper</option>

                            </select>
                        </div>
                        <div class="mb-3 form-group">
                         <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
