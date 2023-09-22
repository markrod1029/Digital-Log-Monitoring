<script>





        $(document).ready(function(){
            var empDataTable = $('#empTable').DataTable({
                dom: 'Blfrtip',
                "scrollX": true,
                "lengthChange": false,

                buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ] 
            });

        });

        $('.dataTables_length').addClass('bs-select');
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
    