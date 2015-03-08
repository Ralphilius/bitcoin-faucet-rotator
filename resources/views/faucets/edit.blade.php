@extends('app')

@section('content')
    {!! Form::model($faucet, ['method' => 'PATCH', 'route' => ['faucets.update', $faucet->id], 'class' => 'form-horizontal']); !!}
    <fieldset>
        <legend><h1 class="page-heading">Edit '{!! $faucet->name !!}'</h1></legend>

        <div class="form-group">
            {!! Form::label('name', 'Faucet Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('url', 'Faucet URL:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('url', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('interval_minutes', 'Interval (minutes):', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::number('interval_minutes', null, ['class' => 'form-control', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('min_payout', 'Minimum Payout (satoshis):', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::number('min_payout', null, ['class' => 'form-control', 'min' => 0]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('max_payout', 'Maximum Payout (satoshis):', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::number('max_payout', null, ['class' => 'form-control', 'min' => 1]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('faucet_payment_processors[]', 'Payment Processor/s', ['class' => 'col-lg-2 control-label'] ) !!}
            <div class="col-lg-10">
                {!! Form::select('faucet_payment_processors[]', $payment_processors, $selected = $payment_processor_ids, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('has_referral_program', 'Has Referral Program?', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                <div class="radio">
                    {!! Form::label('choice_yes', 'Yes', ['class' => 'col-lg-2']) !!}
                    {!! Form::radio('has_referral_program', 1, ($faucet->has_ref_program == 1) ? true : false, ['id' => 'choice_yes']) !!}

                </div>
                <div class="radio">
                    {!! Form::label('choice_no', 'No', ['class' => 'col-lg-2']) !!}
                    {!! Form::radio('has_referral_program', 0, ($faucet->has_ref_program == 0) ? true : false, ['id' => 'choice_no']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('ref_payout_percent', 'Referral Payout (%):', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::number('ref_payout_percent', null, ['class' => 'form-control', 'min' => 0, 'max' => 100]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('comments', 'Comments', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::textarea('comments', null, ['class' => 'form-control', 'rows' => 5]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('is_paused', 'Is The Faucet Paused?', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                <div class="radio">
                    {!! Form::label('choice_yes', 'Yes', ['class' => 'col-lg-2']) !!}
                    {!! Form::radio('is_paused', 1, $faucet_is_paused == 1, ['id' => 'choice_yes']) !!}

                </div>
                <div class="radio">
                    {!! Form::label('choice_no', 'No', ['class' => 'col-lg-2']) !!}
                    {!! Form::radio('is_paused', 0, $faucet_is_paused == 0, ['id' => 'choice_no']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Update/Edit Faucet', ['class' => 'btn btn-lg btn-info pull-left'] ) !!}
            </div>
        </div>

    </fieldset>
    {!! Form::close(); !!}
@endsection