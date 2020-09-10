@component('mail::message')

    # Eingangsbestätigung

    Hey {{request('name')}}, hier ist deine Nachricht an uns:

    "{{request('msg')}}"

    Wir antworten dir so schnell wie möglich!

    Dein {{config('app.name')}} Team.
@endcomponent
