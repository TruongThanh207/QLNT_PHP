
  $('[name=billnow]').click(function(){
     flag = '1';
     console.log(flag);
     
     var tienphong = $('#tienphong').text();
     var debit = $('#debit').text();
     var xe_price = $('#xe_price').text();
     var xe =$('#xe').val();
      
    // $('#tongtien').text((parseInt(tienphong) +parseInt(debit) + xe*parseInt(xe_price)+parseInt(index_nuoc)*parseInt(nuoc)+parseInt(index_dien)*parseInt(dien) + parseInt(oghep)));
    var x = parseInt(tienphong) +parseInt(debit) + xe*parseInt(xe_price);
      $('#tongtien').text(x);
      $('#codemoney').val(x);
    var tongtien =0;
    var thcap =0;
    var internet = 0;
    $('#thcap').click(function(){
        
        thcap = $('#thcap').val();
        x += parseInt(thcap);
        $('#tongtien').text(x);
        $('#codemoney').val(x);
      
    })
     $('#internet').click(function(){
     
  
        internet = $('#internet').val();
        x += parseInt(internet);
        $('#tongtien').text(x);
        $('#codemoney').val(x);


      
    })
     
    //tinh tien phonng

  });
     
