/*
------------------------------------
    : Custom - Form Wizards js :
------------------------------------
*/
'use strict';
$(document).ready(function() {
  var form = $("#basic-form-wizard");
  form.children("div").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      onStepChanging: function (event, currentIndex){
          let result =loadfunction(currentIndex);
          if (result){
                return form;
          }
      },
      onStepChanged: function (event, currentIndex){
          let result =loadfunction(currentIndex);
          if (result){
              return form;
          }
      },
      onFinishing: function (event, currentIndex)
      {
          let result =loadfunction(currentIndex);
          if (result){
              return form;
          }
      },
      onFinished: function (event, currentIndex)
      {
          let result =loadfunction(currentIndex);
          if (result){
              registeruser();
              // $("#basic-form-wizard").submit();
          }
      }
  });
  var verticalform = $("#vertical-form-wizard");
  verticalform.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    onFinishing: function (event, currentIndex)
      {
          return verticalform;
      },
      onFinished: function (event, currentIndex)
      {
          $("#vertical-form-wizard").submit();
      }
  });
  $('#basic-form-wizard .steps').prepend( "<div class='form-wizard-line'></div>" );
});
