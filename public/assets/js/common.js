 $(document).ready(function() {
   var userDataTable = $('#calculationtable').DataTable({
    searching: false,
    // paging: false,
    // info: false,
    // bSort: false,
    processing: true,
    serverSide: true,
    // ajax: "getuser",
    'ajax': {
       'url':'getcalculation',
    },
    columns: [
       { data: 'amount' },
       { data: 'rate' },
       { data: 'time' },
       { data: 'intrest' },
    ],
    "pageLength": 10
   });
     var userDataTable = $('#usertable').DataTable({
    searching: false,
    // paging: false,
    // info: false,
    // bSort: false,
    processing: true,
    serverSide: true,
    // ajax: "getuser",
    'ajax': {
       'url':'getusers',
    },
    columns: [
       { data: 'name' },
       { data: 'email' },
       { data: 'total' },
    ],
    "pageLength": 10
   });
});
function isNumberKey(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
          return false;
      }
      return true;
    }
$(document).on('click', '#calculateint', function() {
        var pamount = $('#pamount').val();
        var rate = $('#rate').val();
        var period = $('#tperiod').val();
        if (pamount == "") {
            alert("Principal Amount is required");
            return false;
        }
        if (rate == "") {
            alert("Interest Rate is required");
            return false;
        }
        if (period == "") {
            alert("Time period is required");
            return false;
        }
        if(pamount){
            var simpleintrest = pamount*rate*period/100;
            var fixedNum = parseFloat(simpleintrest).toFixed( 2 );
            document.getElementById('sintrest').value= fixedNum;
        }
});


