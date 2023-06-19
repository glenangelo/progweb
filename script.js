// Get current date
const currentDate = new Date();

// Month names
const monthNames = [
  "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

// Render calendar
function renderCalendar() {
  // Get calendar element
  const calendar = document.getElementById("calendar");

  // Clear previous calendar
  calendar.innerHTML = "";

  // Create calendar header
  const header = document.createElement("div");
  header.className = "header";
  header.innerHTML = `
    <button id="prev-btn">&lt;</button>
    <h2>${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}</h2>
    <button id="next-btn">&gt;</button>
  `;
  calendar.appendChild(header);

  // Create calendar table
  const table = document.createElement("table");

  // Create table header
  const thead = document.createElement("thead");
  const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  let headerRow = "<tr>";
  for (let day of days) {
    headerRow += `<th>${day}</th>`;
  }
  headerRow += "</tr>";
  thead.innerHTML = headerRow;
  table.appendChild(thead);

  // Create table body
  const tbody = document.createElement("tbody");

  // Get the first day of the current month
  const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
  const startDay = firstDay.getDay();

  // Get the last day of the current month
  const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
  const endDay = lastDay.getDate();

  let date = 1;
  let row = document.createElement("tr");

  // Render empty cells for previous month
  for (let i = 0; i < startDay; i++) {
    const cell = document.createElement("td");
    cell.classList.add("prev-month");
    row.appendChild(cell);
  }

  // Render days of the current month
  for (let i = 0; i < 7 - startDay; i++) {
    let x = new Date();
    x.setMonth(currentDate.getMonth());
    x.setDate(date);
    const cell = createDayCell(x);
    row.appendChild(cell);
    date++;
  }

  tbody.appendChild(row);

  // Render remaining days
  while (date <= endDay) {
    const newRow = document.createElement("tr");
    for (let i = 0; i < 7 && date <= endDay; i++) {
      let x = new Date();
      x.setMonth(currentDate.getMonth());
      x.setDate(date);
      const cell = createDayCell(x);
      newRow.appendChild(cell);
      date++;
    }
    tbody.appendChild(newRow);
  }

  table.appendChild(tbody);
  calendar.appendChild(table);

  // Add event listeners to previous and next buttons
  document.getElementById("prev-btn").addEventListener("click", goToPreviousMonth);
  document.getElementById("next-btn").addEventListener("click", goToNextMonth);
}

// Create a day cell
function createDayCell(date) {
  const id = timeFormatting(date);
  const cell = document.createElement("td");
  cell.innerHTML = "<a href='detail.php?id="+id+"'>"+date.getDate()+"</a>";
  // cell.setAttribute
  cell.setAttribute("id",id);
  cell.classList.add("current-month");
  return cell;
}

// Go to previous month
function goToPreviousMonth() {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
}

// Go to next month
function goToNextMonth() {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar();
}

function timeFormatting(time) {
  let year = time.getFullYear();
  let month = time.getMonth()+1;
  if (month<10){
    month = "0"+ month;
  }
  let date = time.getDate();
  if (date<10){
    date = "0"+ date;
  }
  return year+"-"+month+"-"+date;
}

// Render initial calendar
renderCalendar();
