<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../dist/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div>
        <button onclick="toggleSidebar('separator-sidebar')" data-drawer-target="separator-sidebar"
            data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>
        <aside id="separator-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800 dark:bg-gray-800">
                <h1 class="text-white font-sans ml-3 pb-3 font-bold text-lg tracking-widest">HOTELES ATLANTIS</h1>
                <ul class="space-y-2 font-medium">

                    <li>
                        <a href="/"
                            class="flex items-center p-2 text-gray-400 hover:text-gray-800 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                            </svg>

                            <span class="flex-1 ml-3 whitespace-nowrap">HOTELES</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!--Listado de hoteles-->
        <div class="p-8 sm:ml-64">
            <div class="p-0">

                <div class="h-10">
                    <a href="/hotels/create"
                        class="flex text-white bg-gray-700 hover:bg-gray-800 font-normal rounded-lg text-sm px-3 py-1 mr-2 mb-1 float-right absolute top-8 right-10">
                        Agregar Hotel</a>
                    <h1 class="float-left  text-3xl from-neutral-100 md:text-3x1">Listado de Hoteles</h3>

                </div>
                <hr>

                <br> <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NOMBRE
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    DIRECCION
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    N° HABITACIONES
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <th scope="row" class="px-6">{{ $hotel->id }}</th>
                                    <td class="px-6">{{ $hotel->name }}</td>
                                    <td class="px-6">{{ $hotel->nit }}</td>
                                    <td class="px-6">{{ $hotel->address }}</td>
                                    <td class="px-6">{{ $hotel->num_rooms }}</td>

                                    <td class="flex justify-evenly">
                                        <a href="/hotels/{{ $hotel->id }}/edit"
                                            class="text-white bg-blue-400 px-1 rounded-md">Editar</a>
                                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-400 px-1 rounded-md">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>
