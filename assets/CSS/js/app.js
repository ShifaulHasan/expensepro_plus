
console.log("ExpensePro+ loaded");

// assets/js/app.js
// ===============================================
// ExpensePro+ JavaScript File
// Features: Chart, Date-Picker, and AJAX Handling
// ===============================================

// 🧭 ১. Document Ready Event
document.addEventListener("DOMContentLoaded", function () {
  console.log("ExpensePro+ Loaded Successfully!");

  // ✅ ২. Date Picker সক্রিয় করা (HTML5 input type="date" ব্যবহার)
  const dateInputs = document.querySelectorAll('input[type="date"]');
  dateInputs.forEach(input => {
    input.addEventListener("focus", function () {
      this.showPicker?.(); // কিছু ব্রাউজারে বিল্ট-ইন picker দেখায়
    });
  });

  // ✅ ৩. Chart.js দিয়ে Expense vs Income Chart তৈরি
  const chartCanvas = document.getElementById("expenseChart");
  if (chartCanvas) {
    // Chart.js CDN লোড করা হয়েছে কিনা নিশ্চিত করো (views/dashboard.php-তে <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>)
    const ctx = chartCanvas.getContext("2d");

    const chart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
          {
            label: "Expenses",
            data: [5000, 3000, 4500, 2000, 6000, 2500],
            backgroundColor: "rgba(255, 99, 132, 0.6)",
          },
          {
            label: "Income",
            data: [7000, 5500, 6000, 5000, 8000, 6500],
            backgroundColor: "rgba(54, 162, 235, 0.6)",
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: "Amount (৳)",
            },
          },
        },
      },
    });
  }

  // ✅ ৪. AJAX উদাহরণ: রিপোর্ট ফিল্টার রিফ্রেশ করা
  const reportForm = document.getElementById("reportFilterForm");
  if (reportForm) {
    reportForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(reportForm);
      fetch("../controllers/finance/generate_report.php", {
        method: "POST",
        body: formData,
      })
        .then(res => res.text())
        .then(data => {
          document.getElementById("reportContainer").innerHTML = data;
        })
        .catch(err => console.error("Report load error:", err));
    });
  }

  // ✅ ৫. UI Enhancement — Success Message Auto Hide
  const alerts = document.querySelectorAll(".alert-success");
  if (alerts.length > 0) {
    setTimeout(() => {
      alerts.forEach(a => (a.style.display = "none"));
    }, 4000); // ৪ সেকেন্ড পর হাইড হবে
  }
});
