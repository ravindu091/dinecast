<section id="sec-home" class="section active">
        <div class="welcome">
          <div class="welcome-txt">
            <h2>What would you like to work on?</h2>
            <p>Logged in as Chef Sudath. Manage your menus and recipes below.</p>
            <div class="user-id">ID: DC-CHF-42 &nbsp;·&nbsp; Chef</div>
          </div>
          <div class="welcome-illo">👨‍🍳</div>
        </div>

        <!-- Big Action Cards (as shown in wireframe) -->
        <div class="action-cards">
          <div class="action-card" onclick="document.querySelector('[data-section=sec-menus]').click()">
            <div class="ac-icon">🍽️</div>
            <div class="ac-title">Menus</div>
            <div class="ac-badge">12 active menus</div>
          </div>
          <div class="action-card" onclick="document.querySelector('[data-section=sec-recipes]').click()">
            <div class="ac-icon">📖</div>
            <div class="ac-title">Recipes</div>
            <div class="ac-badge warn">3 menu items missing recipes</div>
          </div>
        </div>

        <!-- Stats -->
        <div class="stats" style="margin-top:0;">
          <div class="stat c-green"><div class="stat-ico">🍽️</div><div class="stat-val">4</div><div class="stat-lbl">Active Menus</div></div>
          <div class="stat c-blue"><div class="stat-ico">📖</div><div class="stat-val">10</div><div class="stat-lbl">Total Recipes</div></div>
          <div class="stat c-orange"><div class="stat-ico">⚠️</div><div class="stat-val">2</div><div class="stat-lbl">Menus Without Recipe</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">2</div><div class="stat-lbl">Items Still Missing One</div></div>
        </div>
      </section>