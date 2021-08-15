// discount modal radio button enable or disable

  $('#percentage_radio').on('click', function(e) {
       if($(this).is(':checked',true))  
       {
        $("#disValuePer").prop('disabled', false);
        $("#disValueFlat").prop('disabled', true);
        $("#disValueFlat").attr('value', '');
       }else{
        $("#disValueFlat").prop('disabled', false);
        $("#disValuePer").prop('disabled', true);
        $("#disValuePer").attr('value', '');

       }
  });
  $('#flat_radio').on('click', function(e) {
       if($(this).is(':checked',true))  
       {
        $("#disValuePer").prop('disabled', true);
        $("#disValueFlat").prop('disabled', false);
       }else{
        $("#disValueFlat").prop('disabled', true);
        $("#disValuePer").prop('disabled', false);
       }
  });

  // var discount = 0;
  // function myFunction() {
  //   var disValuePer = document.getElementById("disValuePer").value;
  //   var disValueFlat = document.getElementById("disValueFlat").value;

  //   if(document.getElementById("flat_radio").checked){
  //       discount = +disValueFlat;
  //       document.getElementById('getValueFlatDiscount').value =  disValueFlat;
  //     }
  //   if(document.getElementById("percentage_radio").checked){
  //       discount = total * disValuePer / 100;
  //       document.getElementById('getValuePerDiscount').value =  disValuePer;
  //     }  
  // }