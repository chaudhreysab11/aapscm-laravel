<x-layouts.auth-portal
    eyebrow="AAPSCM® Email Verification"
    title="Verify Email"
    compact
>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-[14px] text-emerald-800 dark:border-emerald-900/50 dark:bg-emerald-950/40 dark:text-emerald-200">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <x-ui.icon name="mail" class="h-4 w-4" />
                Resend Verification
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-[14px] font-semibold text-slate-600 transition hover:text-slate-900 dark:text-slate-300 dark:hover:text-white">
                Log Out
            </button>
        </form>
    </div>
</x-layouts.auth-portal>
