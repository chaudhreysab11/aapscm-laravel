@php
	$data = is_array($page->page_data ?? null) ? $page->page_data : [];
@endphp

<x-layouts.cms>
	<x-cms.seo-head :page="$page" />

	<main class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
		<header class="mb-10">
			<h1 class="text-3xl font-bold text-slate-900">
				{{ $data['page_heading'] ?? $page->title }}
			</h1>

		</header>

		<section>
			<h2 class="mb-6 text-2xl font-semibold text-slate-900">
				{{ $data['section_heading'] ?? 'Board of Directors' }}
			</h2>

			<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
				@foreach ($boardMembers as $member)
					@php
						$profileUrl = $member->profile_page_slug
							? url('/' . trim($member->profile_page_slug, '/')) . '/'
							: null;
					@endphp

					<article class="rounded border border-slate-200 bg-white p-5 shadow-sm">
						@if ($member->avatar_image)
							<img class="mb-4 h-28 w-28 rounded object-cover" src="{{ $member->avatar_image }}" alt="{{ $member->name }}">
						@endif

						<h3 class="text-lg font-semibold text-slate-900">
							@if ($profileUrl)
								<a class="hover:text-blue-700" href="{{ $profileUrl }}">{{ $member->name }}</a>
							@else
								{{ $member->name }}
							@endif
						</h3>

						@if ($member->role)
							<p class="mt-2 text-sm font-medium text-blue-800">{{ $member->role }}</p>
						@endif

						@if ($member->affiliation)
							<p class="mt-2 whitespace-pre-line text-sm text-slate-600">{{ $member->affiliation }}</p>
						@endif
					</article>
				@endforeach
			</div>
		</section>
	</main>
</x-layouts.cms>
