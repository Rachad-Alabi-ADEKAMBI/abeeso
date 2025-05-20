document.addEventListener("DOMContentLoaded", () => {
  // Price mapping for items
  const prices = {
    // Plats
    "Brochette de boeuf": 10,
    "Poisson Daurade braisé": 10,
    "Cuisse de poulet": 10,
    Monyo: 10,

    // Accompagnements
    Ablo: 3,
    Alloco: 3,
    Akassa: 3,
    "Riz blanc": 3,

    // Boissons sans alcool
    Café: 1,
    "Eau 50cl": 1,
    "Jus de Fruits": 2,
    Soda: 2,
    "Energy Drink": 3,
    "Jus de Bissape": 3,
    "Jus de Gingembre": 3,

    // Boissons avec alcool
    Heineken: 4,
    Desperados: 4,
    Guinness: 4,
    Vodka: 10,
    "Vin Muscador": 10,
  }

  // Get form elements
  const orderForm = document.getElementById("order-form")
  const foodNameSelect = document.getElementById("food-name")
  const quantityInput = document.getElementById("quantity")
  const ticketNumberInput = document.getElementById("ticket-number")

  // Get summary elements
  const summaryItem = document.getElementById("summary-item")
  const summaryQuantity = document.getElementById("summary-quantity")
  const summaryPrice = document.getElementById("summary-price")
  const summaryTotal = document.getElementById("summary-total")

  // Get error elements
  const foodNameError = document.getElementById("food-name-error")
  const quantityError = document.getElementById("quantity-error")
  const ticketNumberError = document.getElementById("ticket-number-error")

  // Get quantity buttons
  const minusBtn = document.querySelector(".quantity-btn.minus")
  const plusBtn = document.querySelector(".quantity-btn.plus")

  // Update summary when food name changes
  foodNameSelect.addEventListener("change", updateSummary)

  // Update summary when quantity changes
  quantityInput.addEventListener("input", updateSummary)

  // Handle quantity buttons
  if (minusBtn && plusBtn) {
    minusBtn.addEventListener("click", () => {
      const currentValue = Number.parseInt(quantityInput.value)
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1
        updateSummary()
      }
    })

    plusBtn.addEventListener("click", () => {
      const currentValue = Number.parseInt(quantityInput.value)
      quantityInput.value = currentValue + 1
      updateSummary()
    })
  }

  // Function to update the order summary
  function updateSummary() {
    const selectedFood = foodNameSelect.value
    const quantity = Number.parseInt(quantityInput.value) || 0

    if (selectedFood && prices[selectedFood]) {
      const price = prices[selectedFood]
      const total = price * quantity

      summaryItem.textContent = selectedFood
      summaryQuantity.textContent = quantity
      summaryPrice.textContent = `${price}€`
      summaryTotal.textContent = `${total}€`
    } else {
      summaryItem.textContent = "-"
      summaryPrice.textContent = "-"
      summaryTotal.textContent = "-"
    }
  }

  // Form validation
  if (orderForm) {
    orderForm.addEventListener("submit", (e) => {
      e.preventDefault()
      let isValid = true

      // Validate food name
      if (!foodNameSelect.value) {
        foodNameError.textContent = "Veuillez sélectionner un plat ou une boisson"
        isValid = false
      } else {
        foodNameError.textContent = ""
      }

      // Validate quantity
      const quantity = Number.parseInt(quantityInput.value)
      if (!quantity || quantity < 1) {
        quantityError.textContent = "La quantité doit être au moins 1"
        isValid = false
      } else {
        quantityError.textContent = ""
      }

      // Validate ticket number
      const ticketPattern = /^[A-Z]\d{3}$/
      if (!ticketNumberInput.value) {
        ticketNumberError.textContent = "Le numéro de billet est requis"
        isValid = false
      } else if (!ticketPattern.test(ticketNumberInput.value)) {
        ticketNumberError.textContent = "Format invalide. Exemple: A123"
        isValid = false
      } else {
        ticketNumberError.textContent = ""
      }

      // If form is valid, submit
      if (isValid) {
        // In a real application, you would send this data to a server
        // For this demo, we'll just show an alert
        const selectedFood = foodNameSelect.value
        const quantity = quantityInput.value
        const ticketNumber = ticketNumberInput.value
        const total = prices[selectedFood] * quantity

        alert(
          `Commande envoyée avec succès!\n\nArticle: ${selectedFood}\nQuantité: ${quantity}\nN° Billet: ${ticketNumber}\nTotal: ${total}€`,
        )

        // Reset form
        orderForm.reset()
        updateSummary()
      }
    })
  }

  // Clear error messages when typing
  foodNameSelect.addEventListener("change", () => {
    foodNameError.textContent = ""
  })

  quantityInput.addEventListener("input", () => {
    quantityError.textContent = ""
  })

  ticketNumberInput.addEventListener("input", () => {
    ticketNumberError.textContent = ""
  })

  // Initial summary update
  updateSummary()
})
