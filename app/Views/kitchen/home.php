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
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-bookings]').click()">
            <div class="ac-icon">✅</div>
            <div class="ac-title">Bookings</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-forecast]').click()">
            <div class="ac-icon">📈</div>
            <div class="ac-title">Forecast</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-pr]').click()">
            <div class="ac-icon">🛒</div>
            <div class="ac-title">Purchase Req.</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-attendance]').click()">
            <div class="ac-icon">👥</div>
            <div class="ac-title">Attendance</div>
          </div>
        </div>

        <!-- Overview Title -->

        <div class="sec-hdr" style="margin-top: 15px; margin-bottom: 14px;">
          <div>
            <h2>Overview</h2>
          </div>
        </div>

        <div class="stats">
          <div class="stat c-blue">
            <div class="stat-ico">📅</div>
            <div class="stat-val"><?= $stats['total'] ?></div>
            <div class="stat-lbl">Upcoming Events</div>
          </div>
          <div class="stat c-green">
            <div class="stat-ico">✅</div>
            <div class="stat-val"><?= $stats['confirmed'] ?></div>
            <div class="stat-lbl">Confirmed</div>
          </div>
          <div class="stat c-orange">
            <div class="stat-ico">⏰</div>
            <div class="stat-val"><?= $stats['tentative'] ?></div>
            <div class="stat-lbl">Tentative</div>
          </div>
          <div class="stat c-purple">
            <div class="stat-ico">📋</div>
            <div class="stat-val">1</div>
            <div class="stat-lbl">PR Rejected / Redo</div>
          </div>
        </div>
      </section>