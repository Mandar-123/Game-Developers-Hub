function savedata(formname) {
  $.post($(formname).attr("action"), $(formname + " :input").serializeArray(), function(info) {
    alert(info);
    clearInput(formname);
  });

  $(formname).submit(function() {
    return false;
  });
}

function clearInput(formname) {
  $(formname + " :input").each(function() {
    $(this).val('');
  });
}

function deletedata(formname) {
  $.post($(formname).attr("action"), $(formname + " :input").serializeArray(), function(info) {
    alert(info);

  });

  $(formname).submit(function() {
    return false;
  });
}
