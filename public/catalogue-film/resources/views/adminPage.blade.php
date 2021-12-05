@extends('template')
@section('content')
    <html>
    <main class="team">
        <br><br>

        <div class="container">
            <div class="section-title">
                <h2>Gerer</h2>
                <p>Espace admistration</p>

                <div class="row">

                </div>

            </div>
            <table>
                <!--   The Head of The Table -->
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Nom</th>
                        <th>date creation</th>
                        <th>Role</th>
                        <th>Controle</th>
                    </tr>
                    <!--  End of The Head -->
                </thead>
                <!--   The Body of The Table -->
                <tbody>
                    <!--          First Row -->
                    @foreach ($users as $user)
                        <tr>
                            <td><img src="{{ $user->image }}" alt="" width="50" height="50"
                                    onError="this.src = 'https://bootdey.com/img/Content/avatar/avatar7.png'"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            @if ($user->role == 'admin')
                                <td style="color: green; font-weight: bold;">{{ $user->role }} </td>
                            @else
                                <td style="colrgb(12, 27, 12)reen; font-weight: bold;"> user </td>
                            @endif
                            <td>
                                @if ($user->id != Auth::user()->id)
                                    @if ($user->role == 'admin')
                                        <a href="{{ route('removeAdmin', $user->id) }}" class="btn btn-warning">Enlever
                                            Admin</a>
                                    @endif
                                    @if ($user->role != 'admin')
                                        <a href="{{ route('addAdmin', $user->id) }}" class="btn btn-success">Ajouter
                                            Admin</a>
                                    @endif

                                    @if ($user->role == 'banned')
                                        <a href="{{ route('banDebanUser', $user->id) }}" class="btn btn-danger">Deban</a>
                                    @endif
                                    @if ($user->role != 'banned')
                                        <a href="{{ route('banDebanUser', $user->id) }}" class="btn btn-danger">Bannir</a>
                                    @endif
                                @endif
                                @if ($user->id == Auth::user()->id)
                                    <p style="color: rgb(23, 71, 29); font-weight: bold;">Vous etes admin</p>

                                @endif

                            </td>
                        </tr>
                    @endforeach

                    <!-- End of The of The Table -->
                </tbody>
                <!-- End of The Table -->
            </table>
            <div class="col">
                <div style="display: flex;justify-content: center;">
                    <span class="pagination-link">
                        {{ $users->links() }}
                    </span>
                </div>
            </div>
        </div>


    </main>


    </html>



@endsection
