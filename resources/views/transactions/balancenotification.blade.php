<div class="alert alert-dismissible @if($balanceWarning) alert-danger @else well @endif">
    <p class="lead text-center">
        Stvarno stanje: {{ Helper::price($balanceAmountSum) }} -
        Knjigovodstveno: {{ Helper::price($bookBalance) }}.
        Razlika je: {{ Helper::price($balanceDiff) }}
    </p>
</div>