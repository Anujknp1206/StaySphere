<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for background and animation */
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bg-overlay {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-overlay flex flex-col items-center justify-center text-white p-6">
        <div class="fade-in text-center">
            <h1 class="text-5xl md:text-6xl font-serif font-bold mb-4">
                Thank You for Booking!
            </h1>
            <p class="text-lg md:text-xl font-light mb-6">
                Your reservation at {{ $setting->_site_name }} has been confirmed.
            </p>
            <a href="{{ route('home') }}"
                class="inline-block text-white font-semibold py-3 px-6 rounded-full transition duration-300"
                style="background-color: #AE7D54;"> Back to Homepage </a>

            <a href="{{ route('dashboard') }}"
                class="inline-block text-white font-semibold py-3 px-6 rounded-full transition duration-300"
                style="background-color: #800020;"> Dashboard </a>
        </div>
        <footer class="absolute bottom-4 text-sm opacity-75">
            <strong>Copyright &copy; 2025 <span>{{ $setting->_site_name }}</span> Hotel All rights reserved.
    </div>
    </footer>
    </div>
</body>

</html>