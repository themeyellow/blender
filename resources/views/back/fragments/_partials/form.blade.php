@foreach(locales() as $locale)
    @php(html()->locale($locale))

    <div class="form__group">
        @if ($fragment->contains_image)
            {{ html()->formGroup()->media('images', 'image', 'Afbeelding') }}
        @else
            {{ html()->label(html()->span($locale)->class('label--lang'), 'text') }}
            {{ html()
                ->{$fragment->contains_html ? 'redactor' : 'text'}('text')
                ->value(old(translate_field_name('text'), $fragment->getTranslation($locale)))
            }}
            {{ html()->errorFor('text') }}
        @endif
        {{ html()->error($errors->first(translate_field_name('text', $locale))) }}
    </div>

    @php(html()->endLocale())
@endforeach
