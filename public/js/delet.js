const example=document.getElementById('example');
if (example) {
    example.addEventListener('click',(e) => {
     if (e.target.className ==='btn btn-danger delete-emp') {
         if (confirm('voler vous vrement supprimer?')) {
          const id = e.target.getAttribute('data-id');
          fetch(`/employer/delete/${id}`,{Method:'GET'}).then(res => window.location.reload());
         }
     }

    });
    
}
$(document).ready(function() {
    $('#example').DataTable({dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
"aoColumnDefs": [{
    'bSortable': false,
    'aTargets': [-1]
}],
"oLanguage": {
    "oPaginate": {
        "sFirst": "Premier",
        "sLast": "Dérnier",
        "sNext": "Suivant",
        "sPrevious": "Précedent",
    },
    "sSearch": "Recherche:",
    "sEmptyTable": "Aucune donnée disponible",
    "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
    "sInfoEmpty": "Aucune donnée disponible",
    "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
    "infoPostFix": "",
    "thousands": ",",
    "sLengthMenu": "Afficher par _MENU_ éléments",
    "loadingRecords": "Chargement...",
    "processing": "procéssus...",
    "sZeroRecords": "Aucun résultat trouvé",
},
"iDisplayLength": 10,
"lengthChange": false,
"info": false,
responsive: false
});
} );
$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
        .parent()
        .hasClass("active")
    ) {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .parent()
        .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
      $(this)
        .parent()
        .addClass("active");
    }
  });
  
  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });
  
