<footer class="{{request()->routeIs('blogs.index')?'':'mt-5'}} pt-3 pb-1 footer bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-3">
                {{-- Logo --}}
                <x-misc.img src="{{ getLogo() }}" width="150" alt="Logo" class="img-fluid" />

                {{-- Site Description --}}
                <p class="subheading fw-bold bluecolor-txt mt-3">
                    {!! getGeneralSettings()->site_description ?? '' !!}
                </p>

                {{-- Social Links --}}
                <div class="d-flex gap-3">
                    @foreach (getSocialLinks('settings_social_links') as $social)
                        <a href="{{ $social->link }}" target="_blank">
                            <x-misc.img src="{{ asset('assets/img/' . strtolower($social->platform) . '.png') }}"
                                width="30" alt="{{ $social->platform }}" class="img-fluid" />
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <h2 class="heading bluecolor-txt">
                    @lang('gen.about_us')
                </h2>
                <ul class="subheading bluecolor-txt list-unstyled">
                    <li class="mt-2"><a href="{{route('home')}}" class="bluecolor-txt text-decoration-none">@lang('gen.menu_of_the_week')</a></li>
                    <li class="mt-2"><a href="{{route('who.we.are')}}" class="text-decoration-none bluecolor-txt">@lang('gen.who_are_we')</a></li>
                    <!--<li class="mt-2"><a href="{{route('become.a.leader')}}" class="text-decoration-none bluecolor-txt">@lang('gen.become_a_leader')</a></li>-->
                    <li class="mt-2"><a href="{{route('faqs.index')}}" class="text-decoration-none bluecolor-txt">@lang('gen.faqs')</a></li>
                </ul>
            </div>
            <div class="col-md-3 mt-4">
                <h2 class="heading bluecolor-txt">
                    @lang('gen.company')
                </h2>
                <ul class="subheading bluecolor-txt list-unstyled">
                    <li class="mt-2"><a href="{{route('blogs.index')}}" class="text-decoration-none bluecolor-txt">@lang('gen.blogs')</a></li>
                    <li class="mt-2"><a href="{{route('contact.us')}}" class="text-decoration-none bluecolor-txt">@lang('gen.contact_us')</a></li>
                    <li class="mt-2"><a href="{{route('privacy.policy')}}" class="text-decoration-none bluecolor-txt">@lang('gen.privacy_policy')</a></li>
                    <li class="mt-2"><a href="{{route('terms.and.conditions')}}" class="text-decoration-none bluecolor-txt">@lang('gen.terms_and_conditions')</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="col-md-3 mt-4">
                <h2 class="heading bluecolor-txt">
                    @lang('gen.contact_us')
                </h2>
                <ul class="subheading bluecolor-txt list-unstyled">
                    <li class="mt-2">
                        <a href="tel:{{ getGeneralSettings()->site_phone ?? '' }}"
                            class="bluecolor-txt text-decoration-none">
                            {{ getGeneralSettings()->site_phone ?? '' }}
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="mailto:{{ getGeneralSettings()->site_email ?? '' }}"
                            class="text-decoration-none bluecolor-txt">
                            {{ getGeneralSettings()->site_email ?? '' }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="text-center mt-4">
            <p class="m-0 description fw-normal text-secondary">
                {{ getGeneralSettings()->site_copy_right ?? '' }}
            </p>
        </div>
    </div>
</footer>
