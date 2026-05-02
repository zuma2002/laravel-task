<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Customer - UKM Performance App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10">
    <div class="max-w-4xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline flex items-center font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="bg-slate-800 p-6">
                <h1 class="text-2xl font-bold text-white">Add New Customer Record</h1>
                <p class="text-slate-400 text-sm mt-1">Populating table: customers-100000</p>
            </div>

            <form action="{{ route('products.store') }}" method="POST" class="p-8">
                @csrf

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Row 1 -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Customer ID</label>
                        <input type="text" name="Customer_Id" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Company</label>
                        <input type="text" name="Company" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>

                    <!-- Row 2 -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">First Name</label>
                        <input type="text" name="First_Name" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Last Name</label>
                        <input type="text" name="Last_Name" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>

                    <!-- Row 3 -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">City</label>
                        <input type="text" name="City" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Country</label>
                        <input type="text" name="Country" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Row 4 -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Phone 1</label>
                        <input type="text" name="Phone_1" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Phone 2</label>
                        <input type="text" name="Phone_2" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Row 5 -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="Email" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>

                    <!-- Row 6 -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Subscription Date</label>
                        <input type="date" name="Subscription_Date" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" value="{{ date('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Website</label>
                        <input type="url" name="Website" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="https://">
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="px-10 py-3 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 shadow-lg transition-all active:scale-95">
                        Save Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
