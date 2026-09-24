<section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>Welcome to Kitchen Manager Dashboard</h2>
            <p>Manage events, generate forecasts and submit purchase requisitions.</p>
            <div class="user-id">ID: DC-KM-07 &nbsp;·&nbsp; Kitchen Manager</div>
          </div>
          <div class="welcome-illo">👨‍💼</div>
        </div>

        <!-- Modern Action Cards  -->
        <div class="action-cards action-cards-5">
          <a href="<?= $baseUrl ?>/kitchen/events" class="action-card ac-events">
            <div class="ac-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="3.5" ry="3.5"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
              </svg>
            </div>
            <div class="ac-title">Events</div>
          </a>

          <a href="<?= $baseUrl ?>/kitchen/bookings" class="action-card ac-bookings">
            <div class="ac-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                <rect x="8" y="2" width="8" height="4" rx="1.5" ry="1.5"></rect>
                <path d="m9 14 2 2 4-4"></path>
              </svg>
            </div>
            <div class="ac-title">Bookings</div>
          </a>

          <a href="<?= $baseUrl ?>/kitchen/forecast" class="action-card ac-forecast">
            <div class="ac-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                <polyline points="16 7 22 7 22 13"></polyline>
              </svg>
            </div>
            <div class="ac-title">Forecast</div>
          </a>

          <a href="<?= $baseUrl ?>/kitchen/pr" class="action-card ac-purchase">
            <div class="ac-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="20" r="1.5"></circle>
                <circle cx="18" cy="20" r="1.5"></circle>
                <path d="M2.5 3h3l2.6 11.2a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22.5 7H6.5"></path>
              </svg>
            </div>
            <div class="ac-title">Purchase</div>
          </a>

          <a href="<?= $baseUrl ?>/kitchen/attendance" class="action-card ac-roster">
            <div class="ac-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
            </div>
            <div class="ac-title">Roster</div>
          </a>
        </div>

        <!-- Overview Title -->

        <div class="sec-hdr" style="margin-top: 15px; margin-bottom: 14px;">
          <div>
            <h2>Overview</h2>
          </div>
        </div>

        <div class="stats">
          <div class="stat c-blue">
            <div class="stat-val"><?= $stats['total'] ?></div>
            <div class="stat-lbl">Upcoming Events</div>
          </div>
          <div class="stat c-green">
            <div class="stat-val"><?= $stats['confirmed'] ?></div>
            <div class="stat-lbl">Confirmed</div>
          </div>
          <div class="stat c-orange">
            <div class="stat-val"><?= $stats['tentative'] ?></div>
            <div class="stat-lbl">Tentative</div>
          </div>
          <div class="stat c-purple">
            <div class="stat-val">1</div>
            <div class="stat-lbl">PR Rejected / Redo</div>
          </div>
        </div>
      </section>