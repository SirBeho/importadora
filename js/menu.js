
  const darkModePreference = sessionStorage.getItem('darkMode');

  if (darkModePreference === 'enabled') {
      document.documentElement.classList.add('dark');
  }

const inscribirFormLabels = document.querySelectorAll("#inscribirForm label");
if (inscribirFormLabels) {
  inscribirFormLabels.forEach((labell) => {
    labell.addEventListener("click", (event) => {
      const checkbox = labell.querySelector("input");
      console.log(event);
      console.log(checkbox);

      if (!(event.ctrlKey || event.metaKey)) {
        const otherCheckboxes = document.querySelectorAll("#inscribirForm input");
        otherCheckboxes.forEach((otherCheckbox) => {
          if (otherCheckbox !== checkbox) {
            otherCheckbox.checked = false;
          }
        });
      } else {
        checkbox.checked = !checkbox.checked;
      }
    });
  });
}

const toggleButton = document.getElementById("toggle");
if (toggleButton) {
  toggleButton.addEventListener("click", function () {
    console.log("hola");
    const sidebar = document.getElementById("slidebar");
    sidebar.classList.toggle("toggle");
    sidebar.classList.toggle("w-60");
    sidebar.classList.toggle("w-14");
  });
}


const boton = document.getElementById("control-menu");
if (boton) {
  const targetDiv = document.getElementById("menu");
  boton.addEventListener("click", function () {
    const iconMenu = boton.querySelector("#icon_menu");
    if (iconMenu) {
      iconMenu.classList.toggle("rotate-180");
    }
    if (targetDiv) {
      targetDiv.classList.toggle("h-0");
      targetDiv.classList.toggle("h-28");
      targetDiv.classList.toggle("opacity-0");
    }
  });
}

const enlaces = document.querySelectorAll('.activar');
let ultimoClickeado = localStorage.getItem('ultimoClickeado');
if (enlaces) {
    enlaces.forEach(enlace => {
        enlace.addEventListener('click', () => {
            // Restaurar el color original de todos los enlaces
            enlaces.forEach(enlace2 => {
                enlace2.classList.add('bg-orange-400');
                enlace2.classList.remove('bg-orange-200');
            });

            // Cambiar color del enlace clickeado
            enlace.classList.remove('bg-orange-400');
            enlace.classList.add('bg-orange-200');

            const mostrarId = enlace.getAttribute('mostrar');
            const contenidos = document.querySelectorAll('div.contenedor');
          
            contenidos.forEach(contenido => {
                contenido.classList.add('hidden');
            });

            document.querySelectorAll(mostrarId).forEach(contenido => {
                contenido.classList.remove('hidden');
            });

            ultimoClickeado = mostrarId;
            localStorage.setItem('ultimoClickeado', ultimoClickeado);
        });


        if (ultimoClickeado === enlace.getAttribute('mostrar')) {
            enlace.click();
        }
    });
}

const modal_password = document.getElementById("passwordForm");
if (modal_password) {
  modal_password.addEventListener("submit", function (event) {
    const btn_modal = document.getElementById("btn_modal");
    event.preventDefault();

    const password1 = modal_password.password1.value;
    const password2 = modal_password.password2.value;

    if (password1 !== password2) {
      if (!document.getElementById("msj")) {
        const errorMessage = document.createElement("p");
        errorMessage.id = "msj";
        errorMessage.className = "text-red-500 w-full text-center absolute mb-[2.3rem] transform duration-500 ease-in-out bottom-8";
        errorMessage.textContent = "Las contraseñas no coinciden. Por favor, inténtelo nuevamente.";
        btn_modal.appendChild(errorMessage);
      }
      Msj();
    } else {
      this.submit();
    }
  });
}
