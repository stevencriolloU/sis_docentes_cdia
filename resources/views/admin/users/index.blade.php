

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td>
                            <!-- Formulario para cambiar el rol -->
                            <form action="{{ route('admin.users.update-role', $user) }}" method="POST">
                                @csrf
                                <select name="role" class="form-control">
                                    <option value="estudiante" {{ $user->hasRole('estudiante') ? 'selected' : '' }}>Estudiante</option>
                                    <option value="docente" {{ $user->hasRole('docente') ? 'selected' : '' }}>Docente</option>
                                    <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Cambiar Rol</button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>