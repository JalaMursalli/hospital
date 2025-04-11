



<div class="header-lang">
    <button class="current-lang" type="button">
        {{ strtoupper(app()->getLocale()) }}
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 10L12 15L17 10H7Z" fill="white"/>
        </svg>
    </button>
    <div class="other-langs">

        @foreach(['az','en','ru'] as $language)

                            @if($language==app()->getLocale()) @continue @endif
                            <a href="{{ \App\Helpers\UrlHelper::changeLanguageSegment($language) }}" class="other-lang-item">  {{ strtoupper($language) }}</a>

                        @endforeach

    </div>
</div>
