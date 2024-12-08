document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("shopping-list-modal");
    const closeModal = document.querySelector(".close-modal");
    const generateListButton = document.querySelectorAll(".generate-list-btn");
    const shoppingListContainer = document.getElementById("shopping-list-container");
  
    generateListButton.forEach(button => {
      button.addEventListener("click", async () => {
        const recetaId = button.dataset.recetaId;
  
        try {
          const response = await fetch(`/src/api/generar_lista.php`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ recetaId: recetaId }),
          });
  
          const data = await response.text();
          shoppingListContainer.innerHTML = data;
          modal.style.display = "block";
        } catch (error) {
          console.error("Error al generar la lista:", error);
        }
      });
    });
  
    closeModal.addEventListener("click", () => {
      modal.style.display = "none";
    });
  
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });  