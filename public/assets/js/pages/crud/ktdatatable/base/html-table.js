'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        saveState: {cookie: false},
      },
      translate: {
        records: {
          noRecords: 'Sin resultados',
          processing: 'Espera, por favor...'
        },
        toolbar: {
          pagination: {
            items: {
              default: {
                first: 'Primera',
                prev: 'Anterior',
                next: 'Siguiente',
                last: 'Última',
                more: 'Mas páginas',
                input: 'Número de página',
                select: 'Seleccionar tamaño de página'
              },
              info:  'Mostrando {{start}} - {{end}} de {{total}} registros'
            }
          }
        }
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      /*columns: [
        {
          field: 'ID',
          width: 20
        }, {
          field: 'Cumpleaños',
          type: 'date',
          format: 'DD-MM-YYYY',
          width: 90,
          sorteable: false,
        }, {
          field: 'Móvil',
          type: 'number',
          width: 70
        },  {
          field: 'Email',
          type: 'email',
          //width: 220
        }, {
          field: 'Estado',
          title: 'Estado',
          width: 70,
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Activo',
                'class': ' label-light-success',
              },
              2: {
                'title': 'Inactivo',
                'class': ' label-light-danger',
              },
            };
            return '<span class="label font-weight-bold label-lg' + status[row.Estado].class + ' label-inline">' + status[row.Estado].title + '</span>';
          },
        }, {
          field: 'Acciones',
          title: 'Acciones',
          selector: false,
          sortable: false,
          width: 90,
          overflow: 'visible',
          autoHide: false,
          template: function() {
              return '\
                  <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Edit details">\
                      <span class="svg-icon svg-icon-md">\
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                  <rect x="0" y="0" width="24" height="24"/>\
                                  <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                  <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                              </g>\
                          </svg>\
                      </span>\
                  </a>\
                  <a href="javascript:;" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Delete">\
                      <span class="svg-icon svg-icon-md">\
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                  <rect x="0" y="0" width="24" height="24"/>\
                                  <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                  <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                              </g>\
                          </svg>\
                      </span>\
                  </a>\
              ';
          },
      }
        {
          field: 'Type',
          title: 'Type',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Online',
                'state': 'danger',
              },
              2: {
                'title': 'Retail',
                'state': 'primary',
              },
              3: {
                'title': 'Direct',
                'state': 'success',
              },
            };
            return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.Type].state + '">' + status[row.Type].title + '</span>';
          },
        },
      ],*/
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Estado');
    });

    /*$('#kt_datatable_search_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });*/

    //$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    $('#kt_datatable_search_status').selectpicker();

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});