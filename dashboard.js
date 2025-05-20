document.addEventListener("DOMContentLoaded", () => {
  // Tab switching functionality
  const tabButtons = document.querySelectorAll(".tab-btn")
  const tabContents = document.querySelectorAll(".tab-content")

  tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Remove active class from all buttons and contents
      tabButtons.forEach((btn) => btn.classList.remove("active"))
      tabContents.forEach((content) => content.classList.remove("active"))

      // Add active class to clicked button and corresponding content
      button.classList.add("active")
      const tabId = button.getAttribute("data-tab")
      document.getElementById(`${tabId}-tab`).classList.add("active")
    })
  })

  // Status change functionality
  const statusButtons = document.querySelectorAll(".serve-btn, .pending-btn")

  statusButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const row = this.closest("tr")
      const statusCell = row.querySelector(".status")

      if (statusCell.classList.contains("pending")) {
        statusCell.classList.remove("pending")
        statusCell.classList.add("served")
        statusCell.textContent = "Servi"

        this.classList.remove("serve-btn")
        this.classList.add("pending-btn")
        this.innerHTML = '<i class="fas fa-undo"></i> Annuler'
      } else {
        statusCell.classList.remove("served")
        statusCell.classList.add("pending")
        statusCell.textContent = "En attente"

        this.classList.remove("pending-btn")
        this.classList.add("serve-btn")
        this.innerHTML = '<i class="fas fa-check"></i> Servir'
      }

      // Update stats (in a real app, this would be more sophisticated)
      updateStats()
    })
  })

  // Pagination functionality
  const itemsPerPage = 5
  let currentPage = 1

  const prevPageBtn = document.getElementById("prev-page")
  const nextPageBtn = document.getElementById("next-page")
  const currentPageSpan = document.getElementById("current-page")
  const totalPagesSpan = document.getElementById("total-pages")

  const commandesTableBody = document.getElementById("commandes-table-body")
  const commandesRows = commandesTableBody.querySelectorAll("tr")

  // Calculate total pages
  const totalPages = Math.ceil(commandesRows.length / itemsPerPage)
  totalPagesSpan.textContent = totalPages

  // Function to show appropriate rows based on current page
  function showPage(page) {
    const start = (page - 1) * itemsPerPage
    const end = start + itemsPerPage

    commandesRows.forEach((row, index) => {
      if (index >= start && index < end) {
        row.style.display = ""
      } else {
        row.style.display = "none"
      }
    })

    // Update pagination controls
    currentPageSpan.textContent = page
    prevPageBtn.disabled = page === 1
    nextPageBtn.disabled = page === totalPages
  }

  // Initialize pagination
  showPage(currentPage)

  // Pagination button event listeners
  prevPageBtn.addEventListener("click", () => {
    if (currentPage > 1) {
      currentPage--
      showPage(currentPage)
    }
  })

  nextPageBtn.addEventListener("click", () => {
    if (currentPage < totalPages) {
      currentPage++
      showPage(currentPage)
    }
  })

  // Search functionality
  const searchInput = document.getElementById("search-input")
  const searchBtn = document.getElementById("search-btn")

  function performSearch() {
    const searchTerm = searchInput.value.toLowerCase().trim()

    if (searchTerm === "") {
      commandesRows.forEach((row) => {
        row.style.display = ""
      })
      showPage(1)
      return
    }

    let matchCount = 0

    commandesRows.forEach((row) => {
      const text = row.textContent.toLowerCase()
      if (text.includes(searchTerm)) {
        row.style.display = ""
        matchCount++
      } else {
        row.style.display = "none"
      }
    })

    // Disable pagination when searching
    prevPageBtn.disabled = true
    nextPageBtn.disabled = true
    currentPageSpan.textContent = "1"
    totalPagesSpan.textContent = "1"
  }

  searchBtn.addEventListener("click", performSearch)

  searchInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
      performSearch()
    }

    // If search input is cleared, reset to normal pagination
    if (this.value === "") {
      commandesRows.forEach((row) => {
        row.style.display = ""
      })
      showPage(1)
    }
  })

  // Filter functionality
  const filterSelect = document.getElementById("filter-select")

  filterSelect.addEventListener("change", function () {
    const filterValue = this.value

    if (filterValue === "all") {
      commandesRows.forEach((row) => {
        row.style.display = ""
      })
      showPage(1)
      return
    }

    let matchCount = 0

    commandesRows.forEach((row) => {
      const statusElement = row.querySelector(".status")
      const status = statusElement.textContent.toLowerCase().replace(/\s+/g, "-")

      if (status === filterValue) {
        row.style.display = ""
        matchCount++
      } else {
        row.style.display = "none"
      }
    })

    // Disable pagination when filtering
    prevPageBtn.disabled = true
    nextPageBtn.disabled = true
    currentPageSpan.textContent = "1"
    totalPagesSpan.textContent = "1"
  })

  // Function to update stats
  function updateStats() {
    const totalOrders = commandesRows.length
    const pendingOrders = document.querySelectorAll(".status.pending").length
    const servedOrders = document.querySelectorAll(".status.served").length

    document.querySelector(".stat-card:nth-child(1) .stat-value").textContent = totalOrders
    document.querySelector(".stat-card:nth-child(2) .stat-value").textContent = pendingOrders
    document.querySelector(".stat-card:nth-child(3) .stat-value").textContent = servedOrders
  }

  // Initial stats update
  updateStats()
})
