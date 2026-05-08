<x-layouts.public>

@php
    $badgeClasses = [
        'blue'   => 'bg-blue-50 text-blue-700 ring-blue-100',
        'gray'   => 'bg-gray-100 text-gray-600 ring-gray-200',
        'orange' => 'bg-orange-50 text-orange-700 ring-orange-100',
        'green'  => 'bg-emerald-50 text-emerald-700 ring-emerald-100',
        'purple' => 'bg-purple-50 text-purple-700 ring-purple-100',
    ];

    $typeFilters = [
        ['key' => 'all',           'label' => 'All Results',     'count_key' => 'all'],
        ['key' => 'certification', 'label' => 'Certifications',  'count_key' => 'certification'],
        ['key' => 'page',          'label' => 'Resources',       'count_key' => 'page'],
        ['key' => 'course',        'label' => 'Courses',         'count_key' => 'course'],
        ['key' => 'post',          'label' => 'Articles',        'count_key' => 'post'],
        ['key' => 'product',       'label' => 'Store',           'count_key' => 'product'],
    ];

    $suggestUrl = route('search.suggest');
@endphp

<div class="min-h-screen bg-gray-50">

    {{-- ── Hero search bar ────────────────────────────────────────────────────── --}}
    <div class="bg-[#08186A] border-b border-[#0B2F5E]">
        <div class="max-w-4xl mx-auto px-4 py-10 lg:py-14">

            <h1 class="text-white text-2xl lg:text-3xl font-bold mb-2 text-center">
                @if($q)
                    Results for <span class="text-[#E85D04]">"{{ $q }}"</span>
                @else
                    Search AAPSCM
                @endif
            </h1>
            <p class="text-blue-200 text-sm text-center mb-6">
                Search certifications, courses, executive diplomas, resources and more
            </p>

            {{-- Full search form with live suggestions --}}
            <div x-data="{
                    q: '{{ addslashes($q) }}',
                    items: [],
                    open: false,
                    busy: false,
                    sel: -1,
                    _t: null,
                    onInput() {
                        clearTimeout(this._t);
                        this.sel = -1;
                        if (this.q.length < 2) { this.items = []; this.open = false; return; }
                        this.busy = true;
                        this._t = setTimeout(() => this.fetch(), 320);
                    },
                    async fetch() {
                        try {
                            const r = await fetch('{{ $suggestUrl }}?q=' + encodeURIComponent(this.q));
                            this.items = await r.json();
                            this.open  = this.items.length > 0;
                        } catch(e) { this.items = []; this.open = false; }
                        this.busy = false;
                    },
                    nav(e) {
                        if (!this.open || !this.items.length) return;
                        if (e.key === 'ArrowDown') { e.preventDefault(); this.sel = Math.min(this.sel + 1, this.items.length - 1); }
                        if (e.key === 'ArrowUp')   { e.preventDefault(); this.sel = Math.max(this.sel - 1, -1); }
                        if (e.key === 'Enter' && this.sel >= 0) { e.preventDefault(); window.location.href = this.items[this.sel].url; }
                        if (e.key === 'Escape') { this.open = false; this.sel = -1; }
                    }
                 }"
                 @click.outside="open = false">

                <form action="{{ route('search') }}" method="GET" class="relative" @submit="open = false">
                    <div class="flex items-center gap-3 bg-white rounded-2xl px-5 py-4 shadow-lg ring-1 ring-white/10 focus-within:ring-2 focus-within:ring-[#E85D04]/60 transition-all">
                        {{-- Search icon / spinner --}}
                        <div class="flex-shrink-0">
                            <svg x-show="!busy" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <svg x-show="busy" class="w-5 h-5 text-[#08186A] animate-spin" fill="none" viewBox="0 0 24 24" style="display:none">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                        </div>

                        <input
                            type="text"
                            name="q"
                            x-model="q"
                            @input="onInput()"
                            @keydown="nav($event)"
                            @focus="q.length >= 2 && items.length && (open = true)"
                            placeholder="Search courses, certifications, diplomas..."
                            class="flex-1 text-gray-800 text-base placeholder-gray-400 outline-none border-0 focus:ring-0 bg-transparent"
                            autocomplete="off"
                            aria-label="Search"
                            :aria-expanded="open"
                            autofocus
                        >

                        {{-- Clear button --}}
                        <button x-show="q.length > 0" type="button" @click="q = ''; items = []; open = false; $el.closest('form').querySelector('input').focus()"
                                class="flex-shrink-0 text-gray-300 hover:text-gray-500 transition-colors"
                                style="display:none"
                                aria-label="Clear search">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <button type="submit"
                                class="flex-shrink-0 bg-[#08186A] hover:bg-[#0B2F5E] text-white text-sm font-semibold px-5 py-2 rounded-xl transition-colors">
                            Search
                        </button>
                    </div>

                    {{-- Autocomplete dropdown --}}
                    <div x-show="open && items.length"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute left-0 right-0 top-full mt-2 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50"
                         style="display:none">
                        <template x-for="(item, i) in items" :key="i">
                            <a :href="item.url"
                               @click="open = false"
                               class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0 cursor-pointer"
                               :class="sel === i ? 'bg-slate-50' : ''">
                                <span class="flex-shrink-0 text-[9px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-md ring-1"
                                      :class="{
                                          'bg-blue-50 text-blue-700 ring-blue-100':     item.type === 'certification',
                                          'bg-gray-100 text-gray-600 ring-gray-200':    item.type === 'page',
                                          'bg-orange-50 text-orange-700 ring-orange-100': item.type === 'course',
                                          'bg-emerald-50 text-emerald-700 ring-emerald-100': item.type === 'post',
                                          'bg-purple-50 text-purple-700 ring-purple-100':  item.type === 'product',
                                      }"
                                      x-text="item.badge"></span>
                                <span class="text-sm text-gray-700 truncate font-medium" x-text="item.title"></span>
                            </a>
                        </template>
                        <div class="px-5 py-3 bg-gray-50 border-t border-gray-100">
                            <a :href="'{{ route('search') }}?q=' + encodeURIComponent(q)"
                               class="text-xs font-semibold text-[#08186A] hover:text-[#E85D04] transition-colors flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                View all results for "<span x-text="q" class="italic"></span>"
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- ── Results area ────────────────────────────────────────────────────────── --}}
    <div class="max-w-4xl mx-auto px-4 py-8">

        @if(strlen($q) > 0 && strlen($q) < 2)
            {{-- Too short --}}
            <div class="text-center py-10 text-gray-500 text-sm">
                Please enter at least 2 characters to search.
            </div>

        @elseif($q && $counts['all'] === 0)
            {{-- No results --}}
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-700 mb-1">No results found for "{{ $q }}"</h2>
                <p class="text-sm text-gray-500 mb-6 max-w-xs mx-auto">Try different keywords, check your spelling, or browse a category below.</p>
                <div class="flex flex-wrap justify-center gap-2">
                    @foreach([
                        ['Browse Certifications', '/certifications-for-professionals/'],
                        ['AI Courses',            '/artificial-intelligence-ai-courses/'],
                        ['Executive Diplomas',    '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst/'],
                        ['Online Store',          '/online-courses/'],
                    ] as [$label, $href])
                    <a href="{{ $href }}"
                       class="text-sm font-semibold text-[#08186A] border border-[#08186A]/30 hover:bg-[#08186A] hover:text-white px-4 py-2 rounded-full transition-colors">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
            </div>

        @elseif($q)
            {{-- Type filter tabs --}}
            <div class="flex items-center gap-2 flex-wrap mb-5">
                @foreach($typeFilters as $filter)
                @php $cnt = $counts[$filter['count_key']] ?? 0; @endphp
                @if($cnt > 0 || $filter['key'] === 'all')
                <a href="{{ route('search', ['q' => $q, 'type' => $filter['key']]) }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-medium transition-all
                          {{ $type === $filter['key']
                                ? 'bg-[#08186A] text-white shadow-sm'
                                : 'bg-white text-gray-600 border border-gray-200 hover:border-[#08186A]/40 hover:text-[#08186A]' }}">
                    {{ $filter['label'] }}
                    @if($cnt > 0)
                    <span class="text-[11px] font-bold px-1.5 py-px rounded-full
                                 {{ $type === $filter['key'] ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' }}">
                        {{ $cnt }}
                    </span>
                    @endif
                </a>
                @endif
                @endforeach
            </div>

            {{-- Result count --}}
            <p class="text-xs text-gray-400 mb-4 font-medium uppercase tracking-wide">
                {{ $results->count() }} {{ Str::plural('result', $results->count()) }}
                @if($type !== 'all') in {{ collect($typeFilters)->firstWhere('key', $type)['label'] ?? $type }} @endif
            </p>

            {{-- Result list --}}
            @if($results->isEmpty())
                <div class="text-center py-10 text-gray-500 text-sm">
                    No {{ collect($typeFilters)->firstWhere('key', $type)['label'] ?? $type }} results for "{{ $q }}".
                    <a href="{{ route('search', ['q' => $q]) }}" class="text-[#08186A] font-semibold hover:underline ml-1">View all results</a>
                </div>
            @else
                <div class="space-y-2.5">
                    @foreach($results as $r)
                    @php $badge = $badgeClasses[$r['color']] ?? $badgeClasses['gray']; @endphp
                    <a href="{{ $r['url'] }}"
                       class="group flex items-start gap-4 bg-white border border-gray-100 rounded-2xl p-4 lg:p-5
                              hover:border-[#08186A]/25 hover:shadow-md transition-all duration-150">

                        {{-- Badge --}}
                        <div class="flex-shrink-0 pt-0.5">
                            <span class="inline-block text-[9px] font-bold uppercase tracking-wider px-2 py-1 rounded-lg ring-1 {{ $badge }}">
                                {{ $r['badge'] }}
                            </span>
                        </div>

                        {{-- Content --}}
                        <div class="flex-1 min-w-0">
                            <h2 class="text-sm font-semibold text-gray-800 group-hover:text-[#08186A] transition-colors leading-snug">
                                {{ $r['title'] }}
                                @if(!empty($r['meta']))
                                    <span class="text-xs font-normal text-gray-400 ml-1.5">· {{ $r['meta'] }}</span>
                                @endif
                            </h2>
                            @if(!empty($r['excerpt']))
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed line-clamp-2">
                                {{ $r['excerpt'] }}
                            </p>
                            @endif
                        </div>

                        {{-- Chevron --}}
                        <div class="flex-shrink-0 mt-0.5 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4 text-[#08186A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </a>
                    @endforeach
                </div>
            @endif

        @else
            {{-- Empty state — no query yet --}}
            <div class="mt-4">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest mb-4">Popular Categories</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach([
                        ['Procurement Certifications', '/procurement-management-certifications/', 'blue'],
                        ['Supply Chain Certifications','/supply-chain-management-certifications/', 'blue'],
                        ['AI Courses',                 '/artificial-intelligence-ai-courses/',    'orange'],
                        ['Tourism Management',         '/tourism-management-certifications/',     'green'],
                        ['Executive Diplomas',         '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst/', 'purple'],
                        ['Online Exams',               '/online-exam/',                           'gray'],
                        ['Membership',                 '/membership/',                            'gray'],
                        ['Verify Certificate',         '/verify-a-certificate/',                  'gray'],
                        ['Online Store',               '/online-courses/',                        'orange'],
                    ] as [$label, $href, $color])
                    @php $cls = $badgeClasses[$color] ?? $badgeClasses['gray']; @endphp
                    <a href="{{ $href }}"
                       class="flex items-center gap-3 bg-white border border-gray-100 rounded-xl px-4 py-3.5
                              hover:border-[#08186A]/30 hover:shadow-sm transition-all group">
                        <span class="inline-block text-[9px] font-bold uppercase tracking-wide px-1.5 py-0.5 rounded-md ring-1 flex-shrink-0 {{ $cls }}">
                            {{ $color === 'blue' ? 'Cert' : ($color === 'orange' ? 'Course' : ($color === 'green' ? 'Tourism' : ($color === 'purple' ? 'Diploma' : 'Link'))) }}
                        </span>
                        <span class="text-sm text-gray-700 font-medium group-hover:text-[#08186A] transition-colors leading-snug">
                            {{ $label }}
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

</x-layouts.public>
