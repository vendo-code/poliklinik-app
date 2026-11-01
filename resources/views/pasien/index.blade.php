<x-layouts.app>
    <div class="py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Daftar Poli Pasien</h2>

        <!-- Form Pendaftaran Poli -->
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <form action="{{ route('pasien.daftar-poli.index') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Pilih Poli</label>
                    <select name="id_poli" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Poli --</option>
                        @foreach($polis as $poli)
                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Keluhan</label>
                    <textarea name="keluhan" class="w-full border rounded p-2" rows="3" required></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Daftar</button>
            </form>
        </div>

        <!-- Riwayat Pendaftaran Poli -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-3">Riwayat Pendaftaran</h3>
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">No. Antrian</th>
                        <th class="border p-2">Poli</th>
                        <th class="border p-2">Dokter</th>
                        <th class="border p-2">Keluhan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftarPolis as $item)
                        <tr>
                            <td class="border p-2 text-center">{{ $item->no_antrian }}</td>
                            <td class="border p-2">{{ $item->poli->nama_poli ?? '-' }}</td>
                            <td class="border p-2">{{ $item->dokter->nama ?? '-' }}</td>
                            <td class="border p-2">{{ $item->keluhan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>