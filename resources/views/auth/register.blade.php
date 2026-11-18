<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-12">
        
        <!-- Left Blue Welcome Panel -->
        <div class="md:col-span-5 bg-gradient-to-br from-blue-600 to-blue-800 p-8 md:p-10 text-white flex flex-col justify-center relative overflow-hidden">
            <div class="relative z-10">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-white/15 border border-white/25 mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-extrabold tracking-tight uppercase">Create Account</h2>
                <p class="mt-2 text-sm text-blue-100 leading-relaxed">
                    Register for System Access to the Integrated Senior Citizen Assistance & Benefits Monitoring Portal.
                </p>
                <p class="mt-6 text-[11px] font-semibold tracking-wider text-blue-200 uppercase">
                    Barangay Anomar Coverage Area
                </p>
            </div>
        </div>

        <!-- Right Registration Form -->
        <div class="md:col-span-7 p-8 md:p-10 bg-white">
            <div class="mb-6">
                <h3 class="text-xl font-bold text-slate-900">Sign up</h3>
                <p class="text-xs text-slate-500 mt-1">Fill in your details below to create an account</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-[11px] font-bold tracking-wider text-slate-600 uppercase mb-1">
                        Full Name
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                           placeholder="Juan Dela Cruz"
                           class="w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 outline-none transition">
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-[11px] font-bold tracking-wider text-slate-600 uppercase mb-1">
                        Email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                           placeholder="user@gmail.com"
                           class="w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 outline-none transition">
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Register As (Role) -->
                <div>
                    <label for="role" class="block text-[11px] font-bold tracking-wider text-slate-600 uppercase mb-1">
                        Register As:
                    </label>
                    <select id="role" name="role"
                            class="w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 outline-none transition">
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Staff" {{ old('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-1" />
                </div>

                <!-- Password & Confirm Password -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-[11px] font-bold tracking-wider text-slate-600 uppercase mb-1">
                            Password
                        </label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               placeholder="••••••••"
                               class="w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 outline-none transition">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-[11px] font-bold tracking-wider text-slate-600 uppercase mb-1">
                            Confirm Password
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               placeholder="••••••••"
                               class="w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 outline-none transition">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3 px-4 bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold tracking-wider uppercase rounded-xl shadow-md transition">
                        Register Account
                    </button>
                </div>

                <!-- Login Link -->
                <div class="pt-3 border-t border-slate-100 text-center">
                    <p class="text-xs text-slate-500">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-700">
                            Log in
                        </a>
                    </p>
                </div>
            </form>
        </div>

    </div>
</x-guest-layout>