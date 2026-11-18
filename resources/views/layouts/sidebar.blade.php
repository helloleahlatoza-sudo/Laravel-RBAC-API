<!-- Mobile Backdrop -->
<div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
    class="fixed inset-0 z-20 bg-slate-900/50 lg:hidden" style="display: none;">
</div>

<!-- Sidebar Container -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 bg-blue-700 text-white transition-transform duration-200 ease-in-out lg:static lg:translate-x-0 flex flex-col justify-between shadow-xl">

    <div>
        <!-- Brand Header -->
        <div class="flex items-center gap-3 px-6 py-5 border-b border-blue-600/70">
            <div
                class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-600 border border-blue-400/30 shadow-inner">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <span class="block text-base font-bold tracking-wide leading-tight">OSCA PORTAL</span>
                <span class="block text-[11px] font-medium tracking-wider text-blue-200 uppercase">Barangay
                    Anomar</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="px-4 py-6 space-y-1.5">
            <p class="px-3 mb-2 text-[11px] font-semibold tracking-wider text-blue-300 uppercase">Main Menu</p>

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-sm ring-1 ring-blue-400/40' : 'text-blue-100 hover:bg-blue-600/60 hover:text-white' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Seniors -->
            <a href="{{ route('seniors.index') }}"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('seniors.*') ? 'bg-blue-600 text-white shadow-sm ring-1 ring-blue-400/40' : 'text-blue-100 hover:bg-blue-600/60 hover:text-white' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span>Seniors</span>
            </a>

            <!-- Assistance Requests -->
            <a href="{{ route('assistance.index') }}"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('assistance.*') ? 'bg-blue-600 text-white shadow-sm ring-1 ring-blue-400/40' : 'text-blue-100 hover:bg-blue-600/60 hover:text-white' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Assistance Requests</span>
            </a>

            <!-- Benefit Releases -->
            <a href="{{ route('benefits.index') }}"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('benefits.*') ? 'bg-blue-600 text-white shadow-sm ring-1 ring-blue-400/40' : 'text-blue-100 hover:bg-blue-600/60 hover:text-white' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Benefit Releases</span>
            </a>
        </nav>
    </div>

    <!-- Bottom Sidebar Footer -->
    <div class="p-4 border-t border-blue-600/70">
        <div class="px-3 py-2 rounded-lg bg-blue-800/50 text-xs text-blue-200">
            <p class="font-semibold text-white">Senior Citizen System</p>
            <p class="mt-0.5 text-[11px]">Monitoring & Benefits</p>
        </div>
    </div>
</aside>
