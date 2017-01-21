<div class="alert alert-dismissible @if($balanceWarning) alert-danger @else well @endif">
    <p class="lead text-center">
        Stvarno stanje: {{ Helper::price($balance->amount_sum) }} -
        Knjigovodstveno: {{ Helper::price($bookBalance) }}.
        Razlika je: {{ Helper::price(abs($balance->amount_sum - $bookBalance)) }}
    </p>
</div>