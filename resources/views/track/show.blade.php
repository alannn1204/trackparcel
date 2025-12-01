<!DOCTYPE html>
<html>
<head>
    <title>Track Parcel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

</head>

<body class="bg-gray-100 min-h-screen">

    <!-- TOP SECTION -->
    <div class="bg-white shadow p-6 mb-10">
        <div class="container mx-auto max-w-4xl">
            <h1 class="text-3xl font-bold mb-4">Track Your Parcel</h1>

            <form action="{{ route('track.search') }}" method="POST" class="flex gap-3">
                @csrf
                <input type="text" name="tracking_number"
                    placeholder="Enter Tracking Number"
                    class="flex-1 border border-gray-300 p-3 rounded-lg focus:ring focus:border-blue-500"
                    required>

                <button
                    class="px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                    Track
                </button>
            </form>
        </div>
    </div>

    <div class="container mx-auto max-w-4xl">

        @if(isset($parcel))

            <!-- PARCEL SUMMARY CARD -->
            <div class="bg-white p-6 rounded-xl shadow mb-8">
                <h2 class="text-xl font-bold mb-4">Tracking Details</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <p><strong>Tracking No:</strong> {{ $parcel->tracking_number }}</p>
                    <p><strong>Customer:</strong> {{ $parcel->customer_name }}</p>
                    <p><strong>Status:</strong>
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800">
                            {{ $parcel->status }}
                        </span>
                    </p>
                    <p><strong>Last Updated:</strong> {{ $parcel->updated_at->format('d M Y, h:i A') }}</p>
                </div>
            </div>

            <!-- PROGRESS BAR (STEPS) -->
            <div class="bg-white p-6 rounded-xl shadow mb-8">
                <h2 class="text-xl font-bold mb-4">Delivery Progress</h2>

                @php
                    $steps = ['Pending / Processing', 'Ready for Delivery', 'Delivered'];
                    $currentStep = array_search($parcel->status, $steps);
                @endphp

                <div class="flex justify-between mb-4">
                    @foreach($steps as $step)
                        <div class="text-center flex-1">
                            <div class="w-8 h-8 mx-auto rounded-full
                                {{ array_search($step, $steps) <= $currentStep
                                    ? 'bg-blue-600'
                                    : 'bg-gray-300' }}">
                            </div>
                            <p class="mt-2 text-sm">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="w-full h-2 bg-gray-300 rounded-full">
                    <div class="h-2 bg-blue-600 rounded-full"
                         style="width: {{ (($currentStep+1)/count($steps))*100 }}%">
                    </div>
                </div>
            </div>

            <!-- TIMELINE -->
            <div class="bg-white p-6 rounded-xl shadow mb-8">
                <h2 class="text-xl font-bold mb-6">Parcel Movement Timeline</h2>

                @if(isset($checkpoints) && count($checkpoints) > 0)
                    <div class="relative border-l-2 border-gray-300 pl-6">
                        @foreach($checkpoints as $c)
                            <div class="mb-6">
                                <div class="absolute -left-3 w-6 h-6 rounded-full bg-blue-600"></div>

                                <p class="font-bold text-lg">{{ $c->location }}</p>
                                <p class="text-gray-600">{{ $c->description }}</p>
                                <p class="text-sm text-gray-500 mt-1">{{ $c->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No movement updates yet.</p>
                @endif
            </div>

        @elseif(isset($notfound))
            <div class="bg-white p-6 shadow rounded-xl">
                <p class="text-red-600 font-semibold text-lg">Tracking number not found.</p>
            </div>
        @endif

    </div>

</body>
</html>
