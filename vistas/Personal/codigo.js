$(document).ready(function(){     
  $("#myTable").dynamicTable({
        //definimos las columnas iniciales    
        columns: [{
              text: "Nombre",
              key: "name"
          },
          {
              text: "Edad",
              key: "age"
          },
          {
              text: "Género",
              key: "gender"
          },
          {
              text: "País",
              key: "pais"
          },        
        ],
 
        //carga de datos
        data: [{
              name: 'José Perez',
              age: 30,
              gender: 'M',
              pais: 'Colombia'    
          },
          {
              name: 'María Pía',
              age: 24,
              gender: 'F',
              pais: 'Brasil'
          },
          {
              name: 'Pedro',
              age: 31,
              gender: 'M',
              pais: 'Perú'
          }
        ],

        //definición de botones
        buttons: {
            addButton: '<input type="button" value="Nuevo" class="btn btn-success" />',
            cancelButton: '<input type="button" value="Cancelar" class="btn btn-primary" />',
            deleteButton: '<input type="button" value="Borrar" class="btn btn-danger" />',
            editButton: '<input type="button" value="Editar" class="btn btn-primary" />',
            saveButton: '<input type="button" value="Guardar" class="btn btn-success" />',
        },
        showActionColumn: true,
        //condicionales
        getControl: function (columnKey) {
            if (columnKey == "age") {
              return '<input type="number" class="form-control" />';
            }

            if (columnKey == "gender") {
              return '<select class="form-control"><option value="M">Masculino</option><option value="F">Femenino</option></select>';
            }

            return '<input type="text" class="form-control" />';
        }

    });	    
});    