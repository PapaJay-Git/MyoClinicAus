function CopyToClipboard(id)
{
  var passed_id = document.getElementById(id);
  var notif = document.getElementById('copy-notif');
  var r = document.createRange();
  r.selectNode(passed_id);
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(r);
  document.execCommand('copy');
  window.getSelection().removeAllRanges();

  // var text = passed_id.textContent+" - copied";
  //
  // passed_id.innerHTML = text;

    if (id == 'allContacts') {
    notif.innerHTML ="";
    notif.innerHTML = "<div class='alert alert-primary' role='alert'><img class ='logo' id='link-logo'  src='images/success.svg' width='35px' height='35px'> Copied all numbers and emails</div>";
    $("#copy-notif").fadeTo(5000, 500).slideUp(500);
    }else {
      notif.innerHTML ="";
      notif.innerHTML = "<div class='alert alert-primary' role='alert'><img class ='logo' id='link-logo'  src='images/success.svg' width='35px' height='35px'> Copied "+passed_id.textContent+"</div>";
      $("#copy-notif").fadeTo(5000, 500).slideUp(500);
    }
}
