<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Terapi Totok Punggung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#dd0b0b',
                        soft: '#dcfce7'
                    },
                    animation: {
                        fadeUp: 'fadeUp 0.8s ease-out forwards',
                        fadeIn: 'fadeIn 1s ease-out forwards',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%': { opacity: 0, transform: 'translateY(40px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' }
                        },
                        fadeIn: {
                            '0%': { opacity: 0 },
                            '100%': { opacity: 1 }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .delay-1 { animation-delay: .2s }
        .delay-2 { animation-delay: .4s }
        .delay-3 { animation-delay: .6s }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

<!-- HERO -->
<section class="bg-gradient-to-br from-green-600 to-green-500 text-white">
    <div class="max-w-6xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-10 items-center">
        <div class="opacity-0 animate-fadeUp">
            <h1 class="text-4xl font-bold mb-4">
                Terapi Totok Punggung
            </h1>
            <p class="text-lg opacity-90 mb-6">
                Terapi alami untuk melancarkan peredaran darah,
                mengurangi pegal, dan membuat tubuh lebih rileks.
            </p>
            <a href="#booking"
               class="inline-block bg-white text-green-600 font-semibold px-6 py-3 rounded-xl shadow
                      hover:scale-105 transition">
                Booking Sekarang
            </a>
        </div>

        <div class="hidden md:block opacity-0 animate-fadeIn delay-2">
            <img src="https://images.unsplash.com/photo-1603398938378-e54eab446dde"
                 class="rounded-3xl shadow-2xl"
                 alt="Terapi Totok Punggung">
        </div>
    </div>
</section>

<!-- INFO -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow opacity-0 animate-fadeUp delay-1">
            <h3 class="font-semibold text-lg mb-2">✨ Manfaat</h3>
            <p class="text-gray-600">
                Membantu melancarkan aliran darah dan meredakan nyeri otot.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow opacity-0 animate-fadeUp delay-2">
            <h3 class="font-semibold text-lg mb-2">🧘 Relaksasi</h3>
            <p class="text-gray-600">
                Memberikan rasa tenang dan meningkatkan kualitas tidur.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow opacity-0 animate-fadeUp delay-3">
            <h3 class="font-semibold text-lg mb-2">💚 Alami</h3>
            <p class="text-gray-600">
                Terapi manual tanpa obat, aman dan nyaman.
            </p>
        </div>
    </div>
</section>

<!-- BOOKING -->
<section id="booking" class="py-16 bg-soft">
    <div class="max-w-3xl mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-xl p-8 opacity-0 animate-fadeUp">

            <h2 class="text-2xl font-bold mb-2 text-center text-green-600">
                Form Booking Terapi
            </h2>
            <p class="text-center text-gray-500 mb-6">
                Silakan isi data dengan nyaman 🌿
            </p>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('booking.submit') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama -->
                <div>
                    <label class="text-sm text-gray-600">Nama Lengkap</label>
                    <input type="text" name="nama" required
                        class="mt-1 w-full px-4 py-3 border rounded-xl
                               focus:ring-2 focus:ring-green-400 transition">
                </div>

                <!-- Tanggal & Jam -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">Tanggal Terapi</label>
                        <input type="date" name="tanggal" required
                            class="mt-1 w-full px-4 py-3 border rounded-xl
                                   focus:ring-2 focus:ring-green-400 transition">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Jam Terapi</label>
                        <input type="time" name="jam" required
                            class="mt-1 w-full px-4 py-3 border rounded-xl
                                   focus:ring-2 focus:ring-green-400 transition">
                    </div>
                </div>

                <!-- Gender -->
                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required
                        class="mt-1 w-full px-4 py-3 border rounded-xl
                               focus:ring-2 focus:ring-green-400 transition">
                        <option value="">Pilih</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <!-- Keluhan -->
                <div>
                    <label class="text-sm text-gray-600">Keluhan</label>
                    <textarea name="keluhan" rows="4" required
                        placeholder="Contoh: pegal di punggung atas..."
                        class="mt-1 w-full px-4 py-3 border rounded-xl
                               focus:ring-2 focus:ring-green-400 transition"></textarea>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-green-600 text-white font-semibold py-3 rounded-xl
                           hover:bg-green-700 transition transform hover:scale-[1.02]
                           shadow-lg">
                    💬 Booking via WhatsApp
                </button>

                <p class="text-xs text-center text-gray-400">
                    Data Anda hanya digunakan untuk keperluan booking
                </p>
            </form>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-green-600 text-white text-center py-4">
    <p class="text-sm">© {{ date('Y') }} Terapi Totok Punggung</p>
</footer>

</body>
</html>
