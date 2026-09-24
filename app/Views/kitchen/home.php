<section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>Welcome to Kitchen Manager Dashboard</h2>
            <p>Manage events, generate forecasts and submit purchase requisitions.</p>
            <div class="user-id">ID: DC-KM-07 &nbsp;·&nbsp; Kitchen Manager</div>
          </div>
          <div class="welcome-illo">👨‍💼</div>
        </div>

        <!-- Big Action Cards  -->
        <div class="action-cards action-cards-5">
          <div class="action-card" onclick="document.querySelector('[data-section=sec-events]').click()">
            <div class="ac-icon">📅</div>
            <div class="ac-title">Events</div>
            <div class="ac-badge">8 upcoming</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-bookings]').click()">
            <div class="ac-icon">✅</div>
            <div class="ac-title">Bookings</div>
            <div class="ac-badge">12 bookings</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-forecast]').click()">
            <div class="ac-icon">📈</div>
            <div class="ac-title">Forecast</div>
            <div class="ac-badge warn">3 short items</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-pr]').click()">
            <div class="ac-icon">🛒</div>
            <div class="ac-title">Purchase Req.</div>
            <div class="ac-badge">4 submitted</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-attendance]').click()">
            <div class="ac-icon">👥</div>
            <div class="ac-title">Attendance</div>
            <div class="ac-badge">Log actual</div>
          </div>
        </div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📅</div><div class="stat-val">8</div><div class="stat-lbl">Upcoming Events</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">5</div><div class="stat-lbl">Confirmed</div></div>
          <div class="stat c-orange"><div class="stat-ico">⏰</div><div class="stat-val">3</div><div class="stat-lbl">Tentative</div></div>
          <div class="stat c-purple"><div class="stat-ico">📋</div><div class="stat-val">1</div><div class="stat-lbl">PR Rejected / Redo</div></div>
        </div>
      </section>