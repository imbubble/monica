<form method="POST" action="{{ $action }}">
    {{ method_field($method) }}
    {{ csrf_field() }}

    @include('partials.errors')

    <h2>{{ trans('people.debt_add_title') }}</h2>

    {{-- Gender --}}
    <fieldset class="form-group">
        <label class="form-check-inline" for="youowe">
            <input type="radio" class="form-check-input" name="in_debt" id="youowe" value="yes" @if(old('in_debt') !== 'no' || $debt->in_debt !== 'no') checked @endif>
            {{ trans('people.debt_add_you_owe', ['name' => $contact->getFirstName()]) }}
        </label>

        <label class="form-check-inline" for="theyowe">
            <input type="radio" class="form-check-input" name="in_debt" id="theyowe" value="no">
            {{ trans('people.debt_add_they_owe', ['name' => $contact->getFirstName()]) }}
        </label>
    </fieldset>

    {{-- Amount --}}
    <div class="form-group">
        <label for="amount">{{ trans('people.debt_add_amount') }} ({{ Auth::user()->currency->symbol }})</label>
        <input type="number" class="form-control" name="amount" id="amount" maxlength="254" value="{{ old('amount') ?? $debt->amount }}" autofocus required>
    </div>

    {{-- Reason --}}
    <div class="form-group">
        <label for="reason">{{ trans('people.debt_add_reason') }}</label>
        <textarea class="form-control" name="reason" id="reason" maxlength="2500">{{ old('reason') ?? $debt->reason }}</textarea>
    </div>

    <div class="form-group actions">
        <button type="submit" class="btn btn-primary">{{ trans('people.debt_add_add_cta') }}</button>
        <a href="{{ route('people.show', $contact) }}" class="btn btn-secondary">{{ trans('app.cancel') }}</a>
    </div> <!-- .form-group -->
</form>
