$(document).ready(function() {
  $('form').submit(function (e) {
    e.preventDefault();
    var file = $('input[name="file"]').get()[0].files[0];
    var url = $('input[name="url"]').val();
    var form = new FormData();

    var key = "am" + "/" + "pictures" + "/" + (new Date).getTime() + '-' + file.name;

    form.append('key', key);
    form.append('success_action_redirect', $('input[name="success_action_redirect"]').val());
    form.append('success_action_status', $('input[name="success_action_status"]').val()); 
    form.append('acl', $('input[name="acl"]').val()); 
    form.append('Content-Type', file.type);      
    form.append('policy', $('input[name="policy"]').val())
    form.append('X-amz-credential', $('input[name="X-amz-credential"]').val());
    form.append('X-amz-algorithm', $('input[name="X-amz-algorithm"]').val());
    form.append('X-amz-date', $('input[name="X-amz-date"]').val());
    form.append('X-amz-signature', $('input[name="X-amz-signature"]').val());
    form.append('file', file);

    $.ajax({
        type: "POST",
        url: url, // get url from form tag
        contentType: false, // guess Content-Type header (it has to be multipart/form-data)
        processData: false, // do not try to process binary data
        data: form,
        success: function() {
          var fullPath = window.location.pathname
          var split = fullPath.split("/");
          var path = split.slice(0, split.length - 1).join("/");
          $.ajax({
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            type: "POST",
            url: path,
            data: { path: key, title: $('#title').val() },
          });
        },
        error : function(jqXHR, textStatus, errorThrown) {
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
      });
    });
  });