@php
	$data = is_array($page->page_data ?? null) ? $page->page_data : [];
	$hasMirrorHtml = is_string(data_get($data, 'body_html')) && trim((string) data_get($data, 'body_html')) !== '';
@endphp

@if ($hasMirrorHtml)
	<x-cms.exact-mirror-page :page="$page" />
@else
	<x-layouts.cms>
	<x-cms.seo-head :page="$page" />

	<main class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
			@if (isset($data['hero']))
				<section class="mb-12">
					<h1 class="text-3xl font-bold text-slate-900">
						{!! $data['hero']['heading_html'] ?? e($data['hero']['heading'] ?? $page->title) !!}
					</h1>

					@if (! empty($data['hero']['fee_html']))
						<div class="mt-4 text-lg text-slate-700">{!! $data['hero']['fee_html'] !!}</div>
					@endif

					@if (! empty($data['hero']['button_text']))
						@if ($ctaProduct !== null && str_contains((string) ($data['hero']['button_url'] ?? ''), 'add-to-cart'))
							<form class="mt-6" action="{{ route('cart.add', $ctaProduct->id) }}" method="POST">
								@csrf
								<input type="hidden" name="redirect_to" value="{{ route('cart.show') }}">
								<button type="submit" class="inline-flex rounded bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
									{{ $data['hero']['button_text'] }}
								</button>
							</form>
						@else
							<a class="mt-6 inline-flex rounded bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800" href="{{ $data['hero']['button_url'] ?? '#' }}">
								{{ $data['hero']['button_text'] }}
							</a>
						@endif
					@endif
				</section>
			@else
				<h1 class="mb-10 text-3xl font-bold text-slate-900">{{ $page->title }}</h1>
			@endif

			@if (isset($data['how_to_become']))
				<section class="mb-12">
					@if (! empty($data['how_to_become']['heading_html']))
						<h2 class="text-2xl font-semibold text-slate-900">{!! $data['how_to_become']['heading_html'] !!}</h2>
					@endif

					@if (! empty($data['how_to_become']['steps']) && is_array($data['how_to_become']['steps']))
						<ol class="mt-6 list-decimal space-y-2 pl-6 text-slate-700">
							@foreach ($data['how_to_become']['steps'] as $step)
								<li>{{ is_array($step) ? ($step['title'] ?? $step['text'] ?? '') : $step }}</li>
							@endforeach
						</ol>
					@endif

					@if (! empty($data['how_to_become']['button_text']))
						@if ($ctaProduct !== null)
							<form class="mt-6" action="{{ route('cart.add', $ctaProduct->id) }}" method="POST">
								@csrf
								<input type="hidden" name="redirect_to" value="{{ route('cart.show') }}">
								<button type="submit" class="inline-flex rounded bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
									{{ $data['how_to_become']['button_text'] }}
								</button>
							</form>
						@else
							<a class="mt-6 inline-flex rounded bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800" href="{{ $data['how_to_become']['button_url'] ?? '#' }}">
								{{ $data['how_to_become']['button_text'] }}
							</a>
						@endif
					@endif
				</section>
			@endif

			@if (isset($data['fee']))
				<section class="mb-12">
					<h2 class="text-2xl font-semibold text-slate-900">{{ $data['fee']['heading'] ?? 'Membership Fee' }}</h2>

					@if (! empty($data['fee']['subtitle']))
						<p class="mt-3 text-slate-700">{{ $data['fee']['subtitle'] }}</p>
					@endif

					@if (! empty($data['fee']['includes']) && is_array($data['fee']['includes']))
						<ul class="mt-4 list-disc space-y-2 pl-6 text-slate-700">
							@foreach ($data['fee']['includes'] as $included)
								<li>{{ $included }}</li>
							@endforeach
						</ul>
					@endif

					@if ($ctaProduct !== null)
						<form class="mt-6" action="{{ route('cart.add', $ctaProduct->id) }}" method="POST">
							@csrf
							<input type="hidden" name="redirect_to" value="{{ route('cart.show') }}">
							<button type="submit" class="inline-flex rounded bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
								Join Now
							</button>
						</form>
					@endif
				</section>
			@endif

			@if (isset($data['form']))
				<section id="application-fm" class="mb-12">
					<h2 class="text-2xl font-semibold text-slate-900">{{ $data['form']['heading'] ?? 'Membership Form' }}</h2>

					@if (! empty($data['form']['fee_text']))
						<p class="mt-3 text-slate-700">{{ $data['form']['fee_text'] }}</p>
					@endif

					@if ($ctaProduct !== null && ! empty($data['form']['checkout_text']))
						<form class="mt-6" action="{{ route('cart.add', $ctaProduct->id) }}" method="POST">
							@csrf
							<input type="hidden" name="redirect_to" value="{{ route('cart.show') }}">
							<button type="submit" class="inline-flex rounded bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">
								{{ $data['form']['checkout_text'] }}
							</button>
						</form>
					@endif
				</section>
			@endif
	</main>
	</x-layouts.cms>
@endif
<x-cms.exact-mirror-page :page="$page" />
