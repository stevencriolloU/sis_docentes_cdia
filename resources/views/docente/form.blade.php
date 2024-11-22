<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="space-y-6 bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h1 class="text-2xl font-bold text-center text-gray-700">Formulario de Datos</h1>

        <!-- Campo de búsqueda -->
        <div>
            <label for="search-email" class="block text-gray-700 font-semibold">Buscar Usuario por Email</label>
            <input 
                id="search-email" 
                type="text" 
                class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" 
                placeholder="Buscar por correo electrónico"
                oninput="searchUser()"
            />
        </div>

        <!-- Resultados de búsqueda -->
        <div id="search-results" class="mt-4">
            <!-- Aquí se mostrarán los usuarios filtrados -->
        </div>

        <div>
            <label for="id_curso_paralelo" class="block text-gray-700 font-semibold">Id Curso Paralelo</label>
            <input 
                id="id_curso_paralelo" 
                name="id_curso_paralelo" 
                type="text" 
                class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" 
                placeholder="Ingrese el Id del Curso Paralelo"
            />
        </div>

        <div>
            <label for="id_periodo" class="block text-gray-700 font-semibold">Id Periodo</label>
            <input 
                id="id_periodo" 
                name="id_periodo" 
                type="text" 
                class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" 
                placeholder="Ingrese el Id del Periodo"
            />
        </div>

        <!-- Id Usuario (oculto) -->
        <select 
            id="id_usuario" 
            name="id_usuario" 
            class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
            style="display:none;">
            
            <option value="" disabled selected>Seleccione un Usuario</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" 
                    data-name="{{ $user->name }}"
                    data-created="{{ $user->created_at }}"
                    data-updated="{{ $user->updated_at }}"
                    data-role="{{ $user->roles->pluck('name')->join(', ') }}">
                    {{ $user->email }}
                </option>
            @endforeach
        </select>

        <!-- Detalles dinámicos -->
        <div id="user-details" class="mt-4 p-4 bg-gray-100 rounded-lg text-sm text-gray-700 hidden">
            <p><strong>Nombre:</strong> <span id="user-name"></span></p>
            <p><strong>Creado:</strong> <span id="user-created"></span></p>
            <p><strong>Actualizado:</strong> <span id="user-updated"></span></p>
            <p><strong>Su rol actual es:</strong> <span id="user-role" class="text-red-500"></span></p>
        </div>

        <div class="flex justify-center">
            <button 
                type="submit" 
                class="bg-blue-500 text-white font-medium hover:bg-blue-600 focus:ring focus:ring-blue-300 rounded-lg px-6 py-2 transition duration-200"
            >
                Enviar
            </button>
        </div>
    </div>
</div>

<script>
    // Función para filtrar usuarios por correo electrónico
    function searchUser() {
        const searchQuery = document.getElementById('search-email').value.toLowerCase();
        const resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = ''; // Limpiar resultados previos

        // Obtener todas las opciones de usuario del select
        const users = document.querySelectorAll('#id_usuario option');
        
        // Filtrar usuarios por el correo electrónico
        users.forEach(option => {
            const email = option.textContent.toLowerCase();
            if (email.includes(searchQuery)) {
                const resultItem = document.createElement('div');
                resultItem.classList.add('bg-gray-200', 'p-2', 'rounded-lg', 'cursor-pointer', 'hover:bg-gray-300');
                resultItem.textContent = option.textContent;
                resultItem.onclick = () => selectUser(option);
                resultsContainer.appendChild(resultItem);
            }
        });
    }

    // Función para manejar la selección de un usuario
    function selectUser(option) {
        // Establece el valor del select oculto
        document.getElementById('id_usuario').value = option.value;

        // Actualiza los detalles del usuario seleccionado
        updateUserDetails(option);
        // Limpia los resultados de búsqueda
        document.getElementById('search-results').innerHTML = '';
    }

    // Función para actualizar los detalles del usuario seleccionado
    function updateUserDetails(option) {
        document.getElementById('user-details').classList.remove('hidden');
        document.getElementById('user-name').innerText = option.dataset.name || 'N/A';
        document.getElementById('user-created').innerText = option.dataset.created || 'N/A';
        document.getElementById('user-updated').innerText = option.dataset.updated || 'N/A';
        document.getElementById('user-role').innerText = option.dataset.role || 'N/A';
    }
</script>
