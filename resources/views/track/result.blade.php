<!DOCTYPE html>
<html>
<head>
    <title>Parcel Status</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-5">Parcel Tracking Result</h1>

        @if(!$parcel)
            <p class="text-red-600 font-semibold">Tracking number not found.</p>
            <a href="/track" class="text-blue-600 underline block mt-3">Try again</a>
        @else
            <div class="space-y-3">
                <p><strong>Tracking No:</strong> {{ $parcel->tracking_number }}</p>
                <p><strong>Customer:</strong> {{ $parcel->customer_name }}</p>
                <p><strong>Status:</strong>
                    <span class="px-3 py-1 bg-blue-200 rounded">
                        {{ $parcel->status }}
                    </span>
                </p>
                <p><strong>Updated at:</strong> {{ $parcel->updated_at->format('d M Y H:i A') }}</p>
            </div>
        @endif
    </div>

</body>
</html>
