@if(!empty($blocks))
<option value="">--- Select Area ---</option>
 @foreach($blocks as $value)
 <option  value="{{ $value->id }}">{{ $value->area_name }}</option>
  @endforeach

@endif