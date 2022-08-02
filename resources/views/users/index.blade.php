@extends('layouts.app')

@section('content')
   <div class="container">
       @if(session()->has('message'))
           <div class="alert alert-success">
               {{ session()->get('message') }}
           </div>
       @endif
       <div class="row">
           <h2>Users</h2>
           <hr>
       </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->address }}, {{ $user->city }}</td>
                        <td>
                            @if(Auth::user()->id != $user->id)
                                <a href="{{ route('users.destroy',[ $user->id]) }}"
                                   class="btn btn-danger"
                                   onclick="event.preventDefault();
                                            document.getElementById('users.destroy{{ $user->id }}').submit();"
                                    title="Delete {{ $user->firstname }} {{ $user->lastname }} ?">Delete
                                </a>
                            @else
                                <a href="#"
                                   class="btn btn-danger disabled"
                                   title="You can not delete yourself!!!"
                                   >Delete
                                </a>
                            @endif
                            <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    <form onsubmit="return confirm('Do you really want to delete this user?')" id="users.destroy{{ $user->id }}" action="{{ route('users.destroy', [$user->id]) }}"
                          method="POST" style="display: none;" >
                        @csrf
                        @method('delete')
                    </form>
                @endforeach
                </tbody>
            </table>
        </div><hr>
       <div class="d-flex align-items-center text-center">
           {{ $users->onEachSide(3)->links() }}
       </div>
   </div>
@endsection
