document.addEventListener("DOMContentLoaded", () => {
  // Mobile Navigation Toggle
  const hamburger = document.querySelector(".hamburger")
  const navLinks = document.querySelector(".nav-links")

  if (hamburger) {
    hamburger.addEventListener("click", function () {
      this.classList.toggle("active")
      navLinks.classList.toggle("active")
    })
  }

  // Close mobile menu when clicking on a link
  const navItems = document.querySelectorAll(".nav-links a")
  navItems.forEach((item) => {
    item.addEventListener("click", () => {
      hamburger.classList.remove("active")
      navLinks.classList.remove("active")
    })
  })

  // Highlight active section in navigation
  function highlightNavigation() {
    const scrollPosition = window.scrollY

    document.querySelectorAll("section").forEach((section) => {
      const sectionTop = section.offsetTop - 100
      const sectionHeight = section.offsetHeight
      const sectionId = section.getAttribute("id")

      if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
        document.querySelectorAll(".nav-links a").forEach((link) => {
          link.classList.remove("active")
          if (link.getAttribute("href") === `#${sectionId}`) {
            link.classList.add("active")
          }
        })
      }
    })
  }

  // Initial call to highlight the correct navigation item
  highlightNavigation()

  // Highlight navigation on scroll
  window.addEventListener("scroll", highlightNavigation)

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()

      const targetId = this.getAttribute("href")
      if (targetId === "#") return

      const targetElement = document.querySelector(targetId)
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 70,
          behavior: "smooth",
        })
      }
    })
  })

  // Ticket counter functionality
  const minusBtn = document.querySelector(".ticket-btn.minus")
  const plusBtn = document.querySelector(".ticket-btn.plus")
  const ticketsInput = document.querySelector("#tickets")

  if (minusBtn && plusBtn && ticketsInput) {
    minusBtn.addEventListener("click", () => {
      const currentValue = Number.parseInt(ticketsInput.value)
      if (currentValue > 1) {
        ticketsInput.value = currentValue - 1
      }
    })

    plusBtn.addEventListener("click", () => {
      const currentValue = Number.parseInt(ticketsInput.value)
      ticketsInput.value = currentValue + 1
    })
  }

  // Form submission (prevent default for demo)
  const contactForm = document.querySelector(".contact-form form")
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault()
      alert("Votre réservation a été envoyée ! (Ceci est une démo)")
      this.reset()
    })
  }
})
