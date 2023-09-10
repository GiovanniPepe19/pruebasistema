var myModal = new bootstrap.Modal(document.getElementById('MyModal'));
let frm = document.getElementById('formulario');
let eliminar = document.getElementById('btnEliminar');
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      headerToolbar:{
          left: 'prev, next, today',
          center: 'title',
          right: 'dayGridMonth, timeGridWeek,'
      },
      events: base_url + 'home/listar',
      editable: true,
      dateClick: function (info){
          //console.log(info);
          frm.reset();
          document.getElementById('id').value = '';
          eliminar.classList.add ('d-none');
          document.getElementById('start').value= info.dateStr;
          document.getElementById('btnAccion').textContent= 'registrar';
          document.getElementById('titulo').textContent= 'registro de citas';
          myModal.show();
      },
      eventClick : function (innfo){
        console.log(innfo);
        eliminar.classList.remove ('d-none');
        document.getElementById('titulo').textContent= 'modificar citas';
        document.getElementById('btnAccion').textContent= 'modificar';
        document.getElementById('id').value = innfo.event.id;
        document.getElementById('title').value = innfo.event.title;
        document.getElementById('start').value = innfo.event.startStr;
        document.getElementById('color').value = innfo.event.backgroundColor;
        myModal.show();
      },
      eventDrop: function (innfo){
        const id = innfo.event.id;
        const fecha = innfo.event.startStr;
        const url = base_url + 'home/drop';
        const http = new XMLHttpRequest();
        const data = new FormData();
        data.append('id', id);
        data.append('fecha', fecha);
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            const respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            if (respuesta.estado){
              calendar.refetchEvents();
            }
            Swal.fire(
              'aviso',
              respuesta.msg,
              respuesta.tipo
            )
          }
        }
      }
    });
    calendar.render();
    frm.addEventListener('submit', function(e){
      e.preventDefault();
      const title = document.getElementById('title').value;
      const fecha = document.getElementById('start').value;
      const color = document.getElementById('color').value;
      if (title == '' || fecha == '' || color == '') {
        swal.fire(
          'aviso',
          'todos los campos son requeridos',
          'wraning'
        )
      }else{
        const url = base_url + 'home/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            const respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            if (respuesta.estado){
              calendar.refetchEvents();
            }
            myModal.hide();
            Swal.fire(
              'aviso',
              respuesta.msg,
              respuesta.tipo
            )
          }
        }
      }
    })
    eliminar.addEventListener('click', function(){
      myModal.hide();
      Swal.fire({
        title: 'Advertencia?',
        text: "estas seguro de eliminar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, eliminar!',
        cancelButtonText: 'cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          const id = document.getElementById('id').value;
          const url = base_url + 'home/eliminar/' + id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            const respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            if (respuesta.estado){
              calendar.refetchEvents();
            }
            Swal.fire(
              'aviso',
              respuesta.msg,
              respuesta.tipo
            )
          }
        }
        }
      })
    })
  });