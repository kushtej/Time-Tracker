console.log("hello world!");




//Select atleast one student form(NOt needed)
// $("form").submit(function (e) {    
//   if($('.roles:checkbox:checked').length == 0) {
//         alert("select atlest 1 checkbox")
//         e.preventDefault();
//     }
// });



$("form").submit(function (e) {
  var start_date = $("#start_date").val();
  var end_date = $("#end_date").val();
  if(Date.parse(start_date) > Date.parse(end_date)) {
        alert("Invalid Date")
        e.preventDefault();
    }
});



