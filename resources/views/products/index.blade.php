<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management - 100k Records</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10">
    <div class="max-w-7xl mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Customer Dashboard</h1>
                <p class="text-gray-600">Managing {{ number_format($products->total()) }} total records</p>
            </div>

            <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Customer
            </a>
        </div>

        <!-- SEARCH & FILTER SECTION -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-6 border border-gray-200">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-wrap gap-4">
                <!-- Search Input -->
                <div class="flex-1 min-w-[300px]">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Search Records</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search by name, company, or email..."
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>

                <!-- Country Filter -->
                <div class="w-64">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Filter by Country</label>
                    <select name="country" class="w-full px-4 py-2 border rounded-lg outline-none appearance-none bg-white">
                        <option value="">All Countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-900 transition font-bold">
                        Apply
                    </button>
                    <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition font-bold">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Data Table -->
        <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-800 text-white text-sm uppercase tracking-wider">
                            <!-- Sortable Headers -->
                            <th class="p-4 font-semibold">
                                <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'Index', 'direction' => request('sort') == 'Index' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-1 hover:text-blue-300">
                                    # @if(request('sort', 'Index') == 'Index') <span>{{ request('direction', 'asc') == 'asc' ? '↑' : '↓' }}</span> @endif
                                </a>
                            </th>
                            <th class="p-4 font-semibold">Customer ID</th>
                            <th class="p-4 font-semibold">
                                <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'First_Name', 'direction' => request('sort') == 'First_Name' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-1 hover:text-blue-300">
                                    Name @if(request('sort') == 'First_Name') <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span> @endif
                                </a>
                            </th>
                            <th class="p-4 font-semibold">
                                <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'Company', 'direction' => request('sort') == 'Company' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center gap-1 hover:text-blue-300">
                                    Company @if(request('sort') == 'Company') <span>{{ request('direction') == 'asc' ? '↑' : '↓' }}</span> @endif
                                </a>
                            </th>
                            <th class="p-4 font-semibold">Location</th>
                            <th class="p-4 font-semibold">Email</th>
                            <th class="p-4 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @forelse($products as $product)
                        <tr class="border-b hover:bg-blue-50 transition duration-150">
                            <td class="p-4 text-gray-400 font-medium">{{ $product->Index }}</td>
                            <td class="p-4 font-mono text-xs text-gray-500">{{ $product->Customer_Id }}</td>
                            <td class="p-4">
                                <div class="font-bold text-gray-900">{{ $product->First_Name }} {{ $product->Last_Name }}</div>
                                <div class="text-xs text-gray-500">{{ $product->Phone_1 }}</div>
                            </td>
                            <td class="p-4">{{ $product->Company }}</td>
                            <td class="p-4">
                                <div class="text-gray-800">{{ $product->City }}</div>
                                <div class="text-xs text-gray-500">{{ $product->Country }}</div>
                            </td>
                            <td class="p-4">
                                <a href="mailto:{{ $product->Email }}" class="text-blue-600 hover:underline">{{ $product->Email }}</a>
                            </td>
                            <td class="p-4">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ isset($product->Index) ? route('products.edit', $product->Index) : '#' }}"
                                       class="flex items-center gap-2 bg-amber-50 text-amber-700 hover:bg-amber-100 border border-amber-200 px-4 py-2 rounded-lg transition duration-200 shadow-sm font-bold text-xs">
                                        EDIT
                                    </a>
                                    <form action="{{ isset($product->Index) ? route('products.destroy', $product->Index) : '#' }}" method="POST" onsubmit="return confirm('Delete record #{{ $product->Index }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="flex items-center gap-2 bg-rose-50 text-rose-700 hover:bg-rose-100 border border-rose-200 px-4 py-2 rounded-lg transition duration-200 shadow-sm font-bold text-xs">
                                            DELETE
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-10 text-center text-gray-500 italic">No records matching your criteria.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Section -->
        <div class="mt-8 bg-white p-4 rounded-lg shadow-md">
            {{ $products->links() }}
        </div>

    </div>
</body>
</html>
