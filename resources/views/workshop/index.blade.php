<x-layout>
    <div class="max-w-2xl mx-auto mt-8">
        <a href="{{ route('workshop.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Workshop</a>

        <table class="w-full mt-4 border border-gray-300">
            <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">ID</th>
                <th class="p-2 text-left">Nama</th>
                <th class="p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($workshops as $workshop)
                <tr class="border-t">
                    <td class="p-2">{{ $workshop->id }}</td>
                    <td class="p-2">{{ $workshop->name }}</td>
                    <td class="p-2 text-center">
                        <a href="{{ route('workshop.edit', $workshop) }}" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
