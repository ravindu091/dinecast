/* ===================================================
   DineCast – CEO Dashboard JS (Vanilla only)
   Layout interactions + optional AJAX
   Data is rendered server-side (PHP) — no mock data.
   =================================================== */
(function () {
  "use strict";

  /* -------------------------------------------------
     Utilities
     ------------------------------------------------- */
  const $ = (sel) => document.querySelector(sel);

  function escapeHtml(str) {
    return String(str ?? "")
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  /* -------------------------------------------------
     1. Date chip (topbar)
     ------------------------------------------------- */
  function initDateChip() {
    const el = $("#dateChip");
    if (!el) return;

    const now = new Date();
    el.textContent = now.toLocaleDateString("en-GB", {
      weekday: "short",
      day: "numeric",
      month: "short",
      year: "numeric"
    });
  }

  /* -------------------------------------------------
     2. Logout button (sidebar footer)
     ------------------------------------------------- */
  function initLogout() {
    const btn = $("#btnLogout");
    if (!btn) return;

    btn.addEventListener("click", function () {
      if (confirm("Are you sure you want to logout?")) {
        const base = window.BASE_URL || "";
        window.location.href = base + "/logout";
      }
    });
  }

  /* -------------------------------------------------
     3. Notifications button (topbar)
     ------------------------------------------------- */
  function initNotifications() {
    const btn = $("#btnNotifications");
    if (!btn) return;

    btn.addEventListener("click", function () {
      // TODO: replace with a real notification drawer / page
      alert("Notifications panel coming soon.");
    });
  }

  /* -------------------------------------------------
     4. Forecast date-range filter (AJAX refresh)
     Only applies to pages that have #btnRunForecast
     ------------------------------------------------- */
  function initForecastFilter() {
    const btn    = $("#btnRunForecast");
    const fromEl = $("#forecastFrom");
    const toEl   = $("#forecastTo");
    const tbody  = $("#forecastTableBody");

    if (!btn || !fromEl || !toEl || !tbody) return;

    // Default dates (today → +7 days)
    const today = new Date();
    const next  = new Date();
    next.setDate(today.getDate() + 7);
    fromEl.value = fromEl.value || today.toISOString().split("T")[0];
    toEl.value   = toEl.value   || next.toISOString().split("T")[0];

    btn.addEventListener("click", function () {
      const from = fromEl.value;
      const to   = toEl.value;
      const base = window.BASE_URL || "";

      tbody.innerHTML =
        '<tr><td colspan="5" style="text-align:center;color:var(--t3);padding:24px;">Loading…</td></tr>';

      fetch(base + "/ceo/getForecastData?from=" +
            encodeURIComponent(from) + "&to=" + encodeURIComponent(to),
            { headers: { "X-Requested-With": "XMLHttpRequest" } })
        .then((r) => {
          if (!r.ok) throw new Error("HTTP " + r.status);
          return r.json();
        })
        .then((res) => {
          if (res.status !== "success" || !Array.isArray(res.data) || !res.data.length) {
            tbody.innerHTML =
              '<tr><td colspan="5" style="text-align:center;color:var(--t3);padding:24px;">No data.</td></tr>';
            return;
          }

          tbody.innerHTML = res.data.map((f) => `
            <tr>
              <td>${escapeHtml(f.ingredient_name)}</td>
              <td>${escapeHtml(f.unit)}</td>
              <td>${Number(f.forecast_demand).toLocaleString()}</td>
              <td>${Number(f.available_stock).toLocaleString()}</td>
              <td><strong>${Number(f.recommended_purchase).toLocaleString()}</strong></td>
            </tr>
          `).join("");
        })
        .catch(() => {
          tbody.innerHTML =
            '<tr><td colspan="5" style="text-align:center;color:var(--danger);padding:24px;">Error loading forecast.</td></tr>';
        });
    });
  }

  /* -------------------------------------------------
     5. Auto-dismiss flash messages (optional)
     ------------------------------------------------- */
  function initFlashMessages() {
    const flash = document.querySelector(".flash-message");
    if (!flash) return;

    setTimeout(() => {
      flash.style.transition = "opacity 0.4s";
      flash.style.opacity = "0";
      setTimeout(() => flash.remove(), 400);
    }, 4000);
  }

  /* -------------------------------------------------
     6. Init on DOM ready
     ------------------------------------------------- */
  document.addEventListener("DOMContentLoaded", function () {
    initDateChip();
    initLogout();
    initNotifications();
    initForecastFilter();
    initFlashMessages();
  });
})();