var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {

            "url": base_url +  "serversidedatatable/customers/ajax_list",
            "type": "POST",
        },

        //Set column definition initialisation properties.
                "sPaginationType": "listbox",
        "order": [], //Initial no order.
          columns: [
              { data: 'project_id' },
              { data: 'product_name' },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="+row.author_name+" data-project_id="+row.project_id+" data-userid=1>"+row.author_name+"</a>"; 
                        }
               }, 
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='http://google.com/search?q="+row.author_name+"+"+row.book_title+"' target='blank'>"+row.book_title+"</a>"; 
                        }
               }, 
              { data: 'email_address' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='callto:"+row.contact_number+"'>"+row.contact_number+"</a>"; 
                        }
               }, 
              { data: 'income_level' },
              { data: 'lead_owner' },
              { data: 'price' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var status = row.date_approve == null ? row.status: row.status +' - '+ new Date(row.date_approve).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+status+'</span> ';                          
                        }
               },
               { data: 'contractual_status'},
               { data: null,
                "render" : function( data, type, row, full ) {

                            var create_remark = row.create_remark == null ? '': row.create_remark ;
                            var date_create_remark = row.date_create_remark == null ? '': row.date_create_remark ;

                            return '<td class="text-center"><textarea data-author_name="'+row.author_name+'" data-project_id="'+row.project_id+'" data-userid="1" class="form-control exampleFormControlTextarea"  style="width:130px;"  name="special_note"  rows="2">'+create_remark+'</textarea><span class="badge badge-success">Date: '+date_create_remark+'</span></td>'; 
                        }
               }, 
                { data: 'lead_date_agent_assign',
                "render" : function( data, type, row, full ) {
                            var lead_date_agent_assign = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                            return lead_date_agent_assign;                          
                        }
               },
               //  { data: 'date_create_remark',
               //      "render" : function( data, type, full ) {
               //              // you could prepend a dollar sign before returning, or do it
               //              // in the formatNumber method itself
               //              var date_create_remark = data == null ? '': data ;
               //              return date_create_remark;                          
               //            }
               // },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<td><button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='"+row.author_name+"' data-project_id='"+row.project_id+"'>View</a>"; 
                        }
               },
              { data: null,
                "render" : function( data, type, row, full ) {
                             if(row.status == 'In Progress'){
                                  return "<button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='"+row.project_id+"'>Collect</button></td>";
                                }
                                else{
                                 return "<button type='button' class='btn btn-success'>Collect</button>";

                                }                         
                        }
               },
           ],
        "columnDefs": [
         { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});
