<!DOCTYPE html>
<html>
<head>
    <title>Track Parcel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-5">Track Parcel</h1>

        <form action="{{ route('track.search') }}" method="POST">
            @csrf

            <label class="block font-semibold mb-2">Tracking Number</label>
            <input type="text" name="tracking_number"
                   class="w-full border p-3 rounded mb-4"
                   placeholder="Enter tracking number" required>

            <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">
                Track Now
            </button>
        </form>
    </div>
</body>
</html>
