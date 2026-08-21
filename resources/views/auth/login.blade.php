<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - CWD Realty & Hospitality</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="h-full antialiased bg-[#0f1d2c] text-slate-100 flex items-center justify-center p-4 sm:p-6 min-h-screen relative overflow-hidden">
    {{-- Decorative Background Elements --}}
    <div class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ asset('hero_section/hero_section.png') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-tr from-[#0b1520] via-[#163049]/90 to-[#0b1520] pointer-events-none"></div>

    {{-- Subtle Glowing Orbs --}}
    <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-[#1479B9]/20 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full bg-[#F4DEAC]/10 blur-3xl pointer-events-none"></div>

    {{-- Login Card --}}
    <div class="relative z-10 w-full max-w-md">
        {{-- Gold Accent Top Line --}}
        <div class="h-[4px] w-full bg-gradient-to-r from-[#8a6a3a] via-[#F4DEAC] to-[#8a6a3a] rounded-t-2xl shadow-lg"></div>

        <div class="bg-[#163049]/95 backdrop-blur-xl border border-slate-700/60 rounded-b-2xl p-7 sm:p-9 shadow-2xl space-y-7">
            {{-- Brand Logo & Header --}}
            <div class="text-center space-y-2">
                <div class="inline-flex items-center justify-center mb-1">
                    <div class="p-2.5 rounded-xl bg-white shadow-md flex items-center justify-center border border-slate-100">
                        <img src="{{ asset('logo_nav_foot/cwd.svg') }}" alt="CWD Realty logo" class="h-8 w-auto object-contain">
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-white tracking-tight">Admin Portal</h1>
                <p class="text-xs text-slate-400">Sign in to manage CWD Realty & Hospitality content</p>
            </div>

            {{-- Error Notification Banner --}}
            @if ($errors->any())
                <div class="p-3.5 rounded-xl bg-rose-500/15 border border-rose-500/40 text-rose-300 text-xs flex items-center gap-2.5 animate-shake">
                    <svg class="w-4 h-4 shrink-0 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Login Form --}}
            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Email Address --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#F4DEAC]">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="admin@example.com"
                            class="w-full pl-10 pr-4 py-3 bg-[#0f2338]/90 border border-slate-600/70 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#F4DEAC] focus:ring-1 focus:ring-[#F4DEAC] transition-all shadow-inner">
                    </div>
                </div>

                {{-- Password with Visibility Toggle --}}
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#F4DEAC]">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required
                            placeholder="••••••••••••"
                            class="w-full pl-10 pr-11 py-3 bg-[#0f2338]/90 border border-slate-600/70 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#F4DEAC] focus:ring-1 focus:ring-[#F4DEAC] transition-all shadow-inner">
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-white transition-colors cursor-pointer" title="Toggle password visibility">
                            <svg id="eye-open-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg id="eye-closed-icon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Remember Me Checkbox --}}
                <div class="flex items-center justify-between pt-1">
                    <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="remember" id="remember" checked
                            class="w-4 h-4 rounded bg-[#0f2338] border-slate-600 text-[#1479B9] focus:ring-[#F4DEAC] focus:ring-offset-0 focus:ring-1 transition-all cursor-pointer">
                        <span class="text-xs text-slate-300 font-medium">Remember me</span>
                    </label>
                </div>

                {{-- Submit Button --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3.5 px-4 bg-gradient-to-r from-[#2A5A8A] to-[#1479B9] hover:from-[#1b436c] hover:to-[#106297] text-white font-bold text-sm rounded-xl shadow-lg hover:shadow-xl transform active:scale-[0.99] transition-all cursor-pointer border border-[#F4DEAC]/30 flex items-center justify-center gap-2">
                        <span>Sign In to Dashboard</span>
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Footer Note --}}
            <div class="pt-2 text-center border-t border-slate-700/50">
                <p class="text-[11px] text-slate-400">
                    &copy; {{ date('Y') }} CWD Realty & Hospitality. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passInput = document.getElementById('password');
            const openIcon = document.getElementById('eye-open-icon');
            const closedIcon = document.getElementById('eye-closed-icon');

            if (passInput.type === 'password') {
                passInput.type = 'text';
                openIcon.classList.add('hidden');
                closedIcon.classList.remove('hidden');
            } else {
                passInput.type = 'password';
                openIcon.classList.remove('hidden');
                closedIcon.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
