//Spinner loading
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

// Modal validate playground
$('#validate-playground').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Valider ' + id)
  modal.find('.modal-text').text('Voulez-vous valider ce terrain ' + name + ' ?')
  $(this).find('.btn-primary').attr("href", "validate_playground_" + id);
})

// Modal delete playground
$('#delete-playground').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Supprimer ' + id)
  modal.find('.modal-text').text('Voulez-vous supprimer ' + name + ' ?')
  $(this).find('.btn-danger').attr("href", "playground/delete/" + id);
})

// Modal delete event
$('#delete-event').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Supprimer ' + id)
  modal.find('.modal-text').text('Voulez-vous supprimer ' + name + ' ?')
  $(this).find('.btn-danger').attr("href", "event/delete/" + id);
})

// Modal delete article
$('#delete-article').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('title') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Supprimer ' + id)
  modal.find('.modal-text').text('Voulez-vous supprimer ?')
  $(this).find('.btn-danger').attr("href", "articles/delete/" + id);
})

// Modal delete account
$('#delete-account').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Supprimer ' + name)
  modal.find('.modal-text').text('Voulez-vous supprimer ?')
  $(this).find('.btn-danger').attr("href", "accounts/delete/" + id);
})

// Modal ban player
$('#ban-user').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Sanctionner ' + name)
  modal.find('.modal-text').text('Voulez-vous bannir ?')
  $(this).find('.btn-danger').attr("href", "ban_account_" + id);
})

// Modal send message
$('#send-message').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('Supprimer ' + name)
  // modal.find('.modal-text').text('Voulez-vous supprimer ?')
  console.log(id)
  $(this).find('.btn-success').attr("value", id);
})

$(document).on("keydown", "form", function(event) { 
  return event.key != "Enter";
});

$('#check-access').change(function() {
  if( $(this).val() != "Public") {
      $('#price').prop( "disabled", false);
  } else {       
      $('#price').prop( "disabled", true);
  }
});

function toggleCheckbox(element)
{
  // element.checked = !element.checked;
  console.log(element.id)

  if (element.checked) {
    console.log("checked")
    ajaxRequest("/admin/features/" + element.id + "/checked")
  } else {
    console.log("unChecked")
    ajaxRequest("/admin/features/" + element.id + "/unchecked")
  }
}

function ajaxRequest(url) 
{
  let request =
  $.ajax({
    type: "POST", //Méthode à employer POST ou GET 
    url: url //Cible du script coté serveur à appeler 
  });
  request.done(function (output) {
    //Code à jouer en cas d'éxécution sans erreur du script du PHP
    console.log(output)
  });
  request.fail(function (error) {
    //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
    console.log(error)
  });
  request.always(function () {
    //Code à jouer après done OU fail quoi qu'il arrive
  });
}