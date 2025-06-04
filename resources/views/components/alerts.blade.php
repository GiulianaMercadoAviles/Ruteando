<div>
    @if (session('success'))
        <div class="flex items-center justify-between bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-lg shadow-md">
            <div class="flex items-center gap-x-3">
                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="text-green-800" onclick="this.parentElement.remove();">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="flex items-center justify-between bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg shadow-md">
            <div class="flex items-center gap-x-3">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
            <button type="button" class="text-red-800" onclick="this.parentElement.remove();">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    @endif
    @if (session('info'))
        <div class="flex items-center justify-between bg-blue-50 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
            <div class="flex items-center gap-x-3">
                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h1m0-4h-1m4 8h-1m0 4h-1m4-4h-1m0-4h-1m4 8h-1m0 4h-1"/>
                </svg>
                <span>{{ session('info') }}</span>
            </div>
            <button type="button" class="text-blue-800" onclick="this.parentElement.remove();">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    @endif
</div>