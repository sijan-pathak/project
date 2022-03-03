<!DOCTYPE html>
<html>
<body>

<h1>The select element</h1>

<form action="{{route('dropdown')}}" method="post">
  <label>country</label>
  <select name="country" id="country">
    <option value="select country">Select country</option>
    @foreach($country as $con)
  <option value="{{$con->c_id}}">{{$con->c_name}}</option>
  @endforeach
  </select>
  <br><br>
  <label>city</label>
  <select name="city" id="city">
  <option value="select city">Select city</option>
  </select>
  <br><br>
  <label>state</label>
  <select name="state" id="state">
  <option value="select state">Select state</option>
  </select>
  <br><br>
  <label>ward</label>
  <select name="ward" id="ward">
  <option value="select ward">Select ward</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
 crossorigin="anonymous"></script>
 <script>
   $(document).ready(function(){
     $('#country').change(function(){
       let con_id = $(this).val();
       $('#city').html('<option value="select city">Select city</option>');
       $.ajax({
         url: '/getCity',
         type:'post',
         data: 'c_id='+con_id+
         '&_token={{csrf_token()}}',
         success:function(result){
           $('#city').html(result)
         }
       })
     });
   });
   $(document).ready(function(){
     $('#city').change(function(){
       let st_id = $(this).val();
       $.ajax({
         url: '/getState',
         type:'post',
         data: 's_id='+st_id+
         '&_token={{csrf_token()}}',
         success:function(result){
           $('#state').html(result)
         }

       })
     });
   });
   $(document).ready(function(){
     $('#state').change(function(){
       let wardno = $($this).val();
       $.ajax({
         url :'/getWard',
         type:'post',
         date:'state_id='+wardno+'&_token={{csrf_token()}}',
         success:function(result){
           $('#ward').html(result)
         }
       });
     });
   });
   </script>
</body>
</html>