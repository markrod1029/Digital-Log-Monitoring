
<script>





        $(document).ready(function(){
            var empDataTable = $('#empTable').DataTable({
                dom: 'Blfrtip',
                "scrollX": true,
                "lengthChange": false,
   responsive: true,
        "searching": true,
 
             buttons:[ 
                 
                    {
		extend:    'copy',

		className: 'btn btn-success',
               
           
	    },
	    
	    {
		extend:    'excelHtml5',
	filename: 'afternoon-report',
		titleAttr: 'Export to Excel',
		className: 'btn btn-success',
             
                exportOptions: {
                   columns: [0,1, 2,3,4, 5]
                }
	    },
	    
	       {
		extend:    'csv',

		titleAttr: 'Export to CSV',
		className: 'btn btn-success',
             
               
	    },
	   {
   extend: 'pdfHtml5',


customize: function (doc) {
    // Add some text to the top of the PDF
    doc.content.splice(0, 0, {
        text: 'San Carlos Preparatory School',
        style: 'header'
    }, {
        text: 'San Carlos City Pangasinan',
        style: 'subheader'
    });

    // Define custom styles for the text
    doc.styles.header = {
        fontSize: 18,
        bold: true,
        alignment: 'center'
    };
    doc.styles.subheader = {
        fontSize: 14,
        bold: false,
        alignment: 'center'
    };

    // Remove the default table styling
    doc.styles.tableHeader = {
        fillColor: '#3C8DBC',
        color: '#fff',
        bold: true
    };
    doc.styles.tableBodyEven = {};
    doc.styles.tableBodyOdd = {};
    doc.styles.tableFooter = {
        fillColor: '#3C8DBC',
        color: '#fff',
        bold: true
    };

}
},
        
	     {
                extend:    'print',
       extend: 'print',
        
            customize: function ( win ) {
                // Add an image to the top of the printed output
      
                $(win.document.body).prepend('<img src="https://preparatory-log.online/admin/admin/logo.png" style=" position:absolute; left:300px; top:-1px; text-center;width:70px;height:70px;">');
               
                // Add some text to the top of the printed output
                $(win.document.body).prepend('<h4 style="text-align:center;margin-top:5px;">San Carlos Preparatory School </h4><h5 style="text-align:center; margin-buttom:20px;"> San Carlos City Pangasinan</h5>');
                    $(win.document.body).find('h1:first').remove();
         
            }
        }
        ],
            });

        });

    
        </script>


<style>
  
  .dt-buttons{
                width: 100%;
                margin-bottom: 20px;
            }

button.dt-button, div.dt-button, a.dt-button, input.dt-button {
  background-color:#3C8DBC;
  color:white;
  font-size:14px;
  border-color: #3C8DBC;
  border-radius:4px;
}


button.dt-button:hover,
div.dt-button:hover,
a.dt-button:hover,
input.dt-button:hover {
  background-color:#3C8DBC;
  color:white;
  font-size:14px;
  border-color: #3C8DBC;
}
button.dt-btn-split-drop-button:hover {
  background-color: #3C8DBC;
}
}
button.dt-button:active:not(.disabled):hover:not(.disabled),
div.dt-button:active:not(.disabled):hover:not(.disabled),
a.dt-button:active:not(.disabled):hover:not(.disabled),
input.dt-button:active:not(.disabled):hover:not(.disabled) {
  box-shadow: inset 1px 1px 3px #999999;
  background-color: rgba(0, 0, 0, 0.1);
  /* Fallback */
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="rgba(0, 0, 0, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)");
}
button.dt-button:hover,
div.dt-button:hover,
a.dt-button:hover,
input.dt-button:hover {
  text-decoration: none;
}
button.dt-button:hover:not(.disabled),
div.dt-button:hover:not(.disabled),
a.dt-button:hover:not(.disabled),
input.dt-button:hover:not(.disabled) {
  border: 1px solid #7460ee;
  background-color: #3C8DBC;
  color:black;
  /* Fallback */
  background: linear-gradient(to bottom, #3C8DBC 0%, #3C8DBC 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="black", EndColorStr="white");
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 2px;
    background-color:white;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: left;
    float:left;
}

.dataTables_wrapper .dataTables_filter {
    float: left;
    text-align: left;
  position:relative;
    font-size:17px;
}

.dataTables_wrapper .dataTables_filter input {
  border: 1px solid #aaa;
  border-radius: 3px;
  padding: 5px;
  padding-right:50px;
  background-color: transparent;
  margin-left: 3px;
}
@media (max-width: 776px)
{
  .dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
    position:relative;
  left:20px;
    font-size:17px;
}
}
    </style>