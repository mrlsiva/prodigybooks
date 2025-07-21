@extends('layouts.app')

@section('content')
<form id="cart" name="cart" action="{{route('subscribe-process')}}" method="post">
@csrf
<input type="radio" name="plan_purchase" id="plan_purchase_plan1" class="plan_purchase" value="199" data-attr="1" data-plan="Plan A"/> <label for="plan_purchase_plan1">PLAN A</label>

<input type="radio" name="plan_purchase" id="plan_purchase_plan2" class="plan_purchase" value="599" data-attr="2" data-plan="Plan B"/> <label for="plan_purchase_plan2">PLAN B</label>

<input type="radio" name="plan_purchase" id="plan_purchase_plan3" class="plan_purchase" value="899" data-attr="3" data-plan="Plan C"/> <label for="plan_purchase_plan3">PLAN C</label>

<input type="text" id="amount" name="amount" class="amount" value="">
<input type="text" id="sku" name="sku" class="sku" value="">
<input type="hidden" id="type" name="type" class="type" value="3">
<input type="hidden" id="plan_name" name="plan_name" class="plan_name" value="">
<input type="submit" value="Purchase">
</form>
<script>
$(".plan_purchase").click(function(){
// alert($(this).data('attr'))
$(".amount").val($(this).val());
var _obj = {
    'sku':$(this).data('attr'),
    'key': 'combo_plan' 
}
$(".sku").val(JSON.stringify(_obj));
$(".plan_name").val($(this).data('plan'));
});
</script>
@endsection