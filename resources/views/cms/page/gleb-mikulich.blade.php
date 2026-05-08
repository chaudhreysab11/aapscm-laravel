<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $personName = $page->page_data['person_name'] ?? $page->title;
        $role = $page->page_data['role'] ?? '';
        $bio = $page->page_data['bio'] ?? '';
        $avatarImage = $page->page_data['avatar_image'] ?? '';
    @endphp

    <style>
        .gleb-profile-title {
            padding-bottom: 9px;
        }

        .gleb-profile-page .eltdf-container-inner {
            width: calc(100% - 78px);
            margin: 50px auto;
        }

        .gleb-profile-page .eltdf-grid-row {
            margin: 0 -20px;
        }

        .gleb-profile-page .eltdf-page-content-holder {
            display: flow-root;
            padding: 0 20px;
            color: #252525;
            font-family: "Open Sans", sans-serif;
            font-size: 15px;
            line-height: 1.8;
        }

        .gleb-profile-title h1 {
            margin-bottom: 8px;
            font-size: 45px;
            line-height: 54px;
            font-weight: 700;
        }

        .gleb-profile-page .eltdf-page-content-holder h3,
        .gleb-profile-page .eltdf-page-content-holder h2,
        .gleb-profile-page .eltdf-page-content-holder h5 {
            margin: 20px 0;
            color: #252525;
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        .gleb-profile-page .eltdf-page-content-holder h3 {
            font-size: 28px;
            line-height: 33.88px;
        }

        .gleb-profile-page .eltdf-page-content-holder h2 {
            margin-top: 26px;
            font-size: 45px;
            line-height: 54px;
        }

        .gleb-profile-page .eltdf-page-content-holder h5 {
            font-size: 18px;
            line-height: 27px;
        }

        .gleb-profile-page .eltdf-page-content-holder p {
            margin: 0 0 1rem;
        }

        .gleb-profile-page .eltdf-page-content-holder p:last-child {
            margin-bottom: 0;
        }

        .gleb-profile-page__image {
            display: block;
            margin: 0;
            width: 206px;
            height: 206px;
        }
    </style>

    <div class="gleb-profile-title">
        <x-cms.eltdf-title-bar
            :title="$page->title"
            :breadcrumbs="[['label' => $page->title]]"
        />
    </div>

    <div class="gleb-profile-page eltdf-container eltdf-default-page-template">
        <div class="eltdf-container-inner clearfix">
            <div class="eltdf-grid-row eltdf-grid-medium-gutter">
                <div class="eltdf-page-content-holder eltdf-grid-col-12">
                    <h3>{{ $personName }}</h3>

                    @if ($avatarImage)
                        <p>
                            <img
                                src="{{ $avatarImage }}"
                                alt="{{ $personName }}"
                                width="206"
                                height="206"
                                class="gleb-profile-page__image"
                            />
                        </p>
                    @endif

                    <h2>{{ $personName }}</h2>

                    @if ($role)
                        <h5>{{ $role }}</h5>
                    @endif

                    {!! $bio !!}
                </div>
            </div>
        </div>
    </div>

</x-layouts.cms>