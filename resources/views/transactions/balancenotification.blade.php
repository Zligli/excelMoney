@if($balanceWarning)
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Obavestenje!</h4>
        <p>Bilans se ne poklapa sa stvarnim stanjem. Stvarno stanje: {{ Helper::price($balance->amount_sum) }} -
            Knjigovodstveno: {{ Helper::price($bookBalance) }}. Razlika je: {{ Helper::price(abs($balance->amount_sum - $bookBalance)) }}</p>
    </div>
@endif