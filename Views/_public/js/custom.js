$(document).ready(function() {

	// Menu Toggle Script
  $(".navbar-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if ($("#wrapper").hasClass("toggled")) {
    	$(".navbar").addClass('navbar-lef');
    }else {
    	$(".navbar").removeClass('navbar-lef');
    }
  });

  $('#example').DataTable({
    "aoColumnDefs":[{
      'bSortable':false,
      'aTargets':[-1]
    }],
    "responsive": true,
    "sPaginationType": "full_numbers",
    "bStateSave": true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
      buttons: {
        copyTitle: 'Copiar al portapapeles',
        copySuccess: {
          _: 'Copiados al portapapeles %d filas.',
          1: 'Copiado al portapapeles 1 fila'
        }
      }
    },
    "dom": 'Bfrtip',
    "buttons": [
      {
        'text':'<i class="fa fa-plus fa-fw"></i> Agregar',
        'className':'btn-success',
        action: function ( e, dt, node, config ) {
          var link = $('#agregar').attr('href');
          location.href = link;
        }
      },
      {
        'extend':'copy',
        'text':'<i class="fa fa-files-o fa-lg" title="Copiar"></i>',
        'className':'export'
      },
      {
        'extend':'csv',
        'text':'<i class="fa fa-file-text-o fa-lg" title="Exportar a csv"></i>',
        'title':'listado',
        'className':'export'
      },
      {
        'extend':'excel',
        'text':'<i class="fa fa-file-excel-o fa-lg" title="Exportar a excel"></i>',
        'title':'listado',
        'className':'export'
      },
      {
        'extend':'pdf',
        'text':'<i class="fa fa-file-pdf-o fa-lg" title="Exportar a pdf"></i>',
        'title':'listado',
        'className':'export'
      },
      {
       'extend':'print',
       'text':'<i class="fa fa-print fa-lg" title="Imprimir"></i>',
       'className':'export'
      }
    ],
    initComplete: function () {
      this.api().columns().every( function () {
        var column = this;
        var select = $('<select><option value="">Todos</option></select>')
          .appendTo( $(column.footer()).empty() )
          .on( 'change', function () {
            var val = $.fn.dataTable.util.escapeRegex(
              $(this).val()
            );
            column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
          } );

        column.data().unique().sort().each( function ( d, j ) {
          if(column.search() === '^'+d+'$'){
            select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
          } else {
            select.append( '<option value="'+d+'">'+d+'</option>' )
          }
        } );

        if(column[0][0] == 6){
          console.log(column);
          $(column.footer()).html('');
        }

      } );
    }
  });

  $('.js-example-basic-single').select2({
    "placeholder": "Seleccionar",
    "allowClear": true,
    "language": {
      "noResults": function(){
        return "No se encontraron resultados";
      }
    }
  });

  if ($('#eliminar input:text').val() == "") {
    $('form button:submit').attr('disabled', 'disabled');
  }

  $('#imagen').fileinput({
    language: 'es',
    allowedFileExtensions : ['jpg', 'png','gif'],
    maxFileSize: 5000,
    maxFileCount: 5,
    showUpload: false,
    layoutTemplates: {
      main1: "{preview}\n" +
      "<div class=\'input-group {class}\'>\n" +
      "   <div class=\'input-group-btn\'>\n" +
      "       {browse}\n" +
      "       {upload}\n" +
      "       {remove}\n" +
      "   </div>\n" +
      "   {caption}\n" +
      "</div>"
    }
  });

  $('#enviar').on('click', function() {
    $(this).button('loading');
  });

  $('.progress .progress-bar').css("width", function() {
    return $(this).attr("aria-valuenow") + "%";
  });

  $(function() {
    $('textarea#edit').froalaEditor({
      language: 'es',
      heightMin: 300,
      heightMax: 300,
      toolbarButtons: ['bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', 'outdent', 'indent', 'clearFormatting', '|', 'undo', 'redo'],
      toolbarButtonsXS: ['bold', 'italic', 'underline', '|', 'undo', 'redo'],

    })
  });

  $('button, .redirect').click(function(event) {
    var url = $(this).attr('href');
    var target = $(this).attr('target');

    if (target == null) {
      var target = '_top';
    }

    window.open(url, target);
  });

});