/*-------------------------------------------
  buttons.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

let btnSave = $('#btnSave'),
    btnAddOptions = $('#btnAddOptions'),
    btnExitOptions = $('#btnExitOptions'),
    btnYesDelete = $('#btnYesDelete'),
    btnNoDelete = $('#btnNoDelete');

function activateSave() {
    btnSave.attr('disabled', false);
}

function disabledSave() {
    btnSave.attr('disabled', true);
}

function activateAddOptions() {
    btnAddOptions.attr('disabled', false);
}

function disabledAddOptions() {
    btnAddOptions.attr('disabled', true);
}

function activateExitOptions() {
    btnExitOptions.attr('disabled', false);
}

function disabledExitOptions() {
    btnExitOptions.attr('disabled', true);
}

function activateYesDelete() {
    btnYesDelete.attr('disabled', false);
}

function disabledYesDelete() {
    btnYesDelete.attr('disabled', true);
}

function activateNoDelete() {
    btnNoDelete.attr('disabled', false);
}

function disabledNoDelete() {
    btnNoDelete.attr('disabled', true);
}

$(function() {
    btnSave.on('click', function() {
        setTimeout(disabledSave, 300);
        setTimeout(activateSave, 800);
    });

    btnAddOptions.on('click', function() {
        setTimeout(disabledAddOptions, 300);
        setTimeout(activateAddOptions, 800);
    });

    btnExitOptions.on('click', function() {
        setTimeout(disabledExitOptions, 300);
        setTimeout(activateExitOptions, 800);
    });

    btnYesDelete.on('click', function() {
        setTimeout(disabledYesDelete, 300);
        setTimeout(activateYesDelete, 800);
    });

    btnNoDelete.on('click', function() {
        setTimeout(disabledNoDelete, 300);
        setTimeout(activateNoDelete, 800);
    });
});


let modal = document.getElementById("ventanaModal");
// Botón que abre el modal
let boton = document.getElementById("abrirModal");
// Hace referencia al elemento <span> que tiene la X que cierra la ventana
// let span = document.getElementsByClassName("cerrar")[0];

boton.addEventListener("click",function() {
    modal.style.display = "block";
  });
  // Si el usuario hace clic fuera de la ventana, se cierra.
  window.addEventListener("click",function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
});












// <div class="parent-wrapper">
//   <div class="subscribe-wrapper">
//     <h4>Ingresa el email vinculado con el usuario para obtener el codigo</h4>
//     <input type="email" name="email" class="subscribe-input" placeholder="Email">
//     <div class="submit-btn">Enviar</div>
//   </div>
// </div>




// body {
//     background-color: #ffb7b7;
//   }
  
//   .parent-wrapper {
//     position: relative;
//     width: 400px;
//     height: 270px;
//     margin: 40px auto 0;
//     color: transparent;
//   }
  
  
//   .subscribe-wrapper {
//     position: absolute;
//     left: -30px;
//     right: -30px;
//     height: 200px;
//     padding: 30px;
//     background-repeat: no-repeat;
//     background-color: #FFF;
//     border-radius: 4px;
//     color: #333;
//     box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
//   }
  
//   .subscribe-wrapper:after {
//     position: absolute;
//     content: "";
//     right: -10px;
//     bottom: 71px;
//     width: 0;
//     height: 0;
//     border-left: 0px solid transparent;
//     border-right: 10px solid transparent;
//     border-bottom: 10px solid #7149c7;
//   }
  
//   .subscribe-wrapper h4 {
//     text-align: center;
//     font-size: 16px;
//     font-weight: bold;
//     letter-spacing: 1px;
//     line-height: 20px;
//   }
  
//   .subscribe-wrapper input {
//     position: absolute;
//     bottom: 30px;
//     border: none;
//     border-bottom: 1px solid #d4d4d4;
//     padding: 10px;
//     width: 65%;
//     background: transparent;
//     transition: all .25s ease;
//   }
  
//   .subscribe-wrapper input:focus {
//     outline: none;
//     border-bottom: 1px solid #a77cf4;
//   }
  
//   .subscribe-wrapper .submit-btn {
//     position: absolute;
//     border-radius: 30px;
//     border-bottom-right-radius: 0;
//     border-top-right-radius: 0;
//     background-color: #a77cf4;
//     color: #FFF;
//     padding: 12px 25px;
//     display: inline-block;
//     font-size: 12px;
//     font-weight: bold;
//     letter-spacing: 2px;
//     right: -10px;
//     bottom: 30px;
//     cursor: pointer;
//     transition: all .25s ease;
//     box-shadow: -5px 6px 20px 0px rgba(51, 51, 51, 0.4);
//   }
  
//   .subscribe-wrapper .submit-btn:hover {
//     background-color: #8e62dc;
//   }