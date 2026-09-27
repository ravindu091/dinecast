<section id="sec-forecast" class="section">
        <div class="sec-hdr"><h2>Forecast</h2><button class="btn btn-primary" onclick="showToast('Forecast generated!')">+ Generate New Forecast</button></div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">👥</div><div class="stat-val">1,078</div><div class="stat-lbl">This Week's Forecast Guests</div></div>
          <div class="stat c-red"><div class="stat-ico">⚠️</div><div class="stat-val">3</div><div class="stat-lbl">Ingredients Short vs Stock</div></div>
          <div class="stat c-orange"><div class="stat-ico">📅</div><div class="stat-val">Aug 19</div><div class="stat-lbl">Next Scheduled Run</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>Forecast Records</h3><p style="font-size:11.5px;color:var(--t3);">Click "View" to see ingredient-level breakdown · Click "Generate PR" to create a draft PR</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event / Date Range</th><th>Generated On</th><th>Forecast Guests</th><th>Linked PR</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – 12 Aug</td><td style="font-size:12px;color:var(--t3);">10/08/2026</td><td style="font-weight:700;">160</td><td><span class="pr-ref">PR-0049</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td class="tbl-main">Corporate Function – 13 Aug</td><td style="font-size:12px;color:var(--t3);">10/08/2026</td><td style="font-weight:700;">27</td><td><span class="pr-ref">PR-0050</span></td><td><div class="acts"><span class="act">View</span></div></td></tr>
                <tr><td class="tbl-main">Birthday Dinner – 14 Aug</td><td style="font-size:12px;color:var(--t3);">11/08/2026</td><td style="font-weight:700;">16</td><td><span style="color:var(--t3);font-size:12px;">— not yet</span></td><td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PR draft created!')">Generate PR</span></div></td></tr>
                <tr><td class="tbl-main">Tech Conference – 16 Aug</td><td style="font-size:12px;color:var(--t3);">11/08/2026</td><td style="font-weight:700;">40</td><td><span style="color:var(--t3);font-size:12px;">— not yet</span></td><td><div class="acts"><span class="act">View</span><span class="act" onclick="showToast('PR draft created!')">Generate PR</span></div></td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board – 20 Aug</td><td style="font-size:12px;color:var(--t3);">—</td><td style="color:var(--t3);">Pending (no menu)</td><td>—</td><td><div class="acts"><span class="act" style="opacity:.5;cursor:default;">No Menu</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Ingredient Shortfall -->
        <div class="card">
          <div class="card-hdr"><h3>⚠️ Ingredient Shortfall (This Week)</h3><p style="font-size:11.5px;color:var(--t3);">Forecast demand vs current stock</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Available Stock</th><th>Safety Stock</th><th>PR Qty (Calculated)</th><th>Status</th></tr></thead>
              <tbody>
                <tr>
                  <td class="tbl-main">Fresh Salmon Fillet</td>
                  <td>48 kg</td>
                  <td style="color:var(--danger);font-weight:700;">2.5 kg</td>
                  <td>4.8 kg (10%)</td>
                  <td style="font-weight:700;color:var(--primary);">50.3 kg</td>
                  <td><span class="badge bg-red">Shortfall</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Fresh Curry Leaves</td>
                  <td>1.2 kg</td>
                  <td style="color:var(--danger);font-weight:700;">50 g</td>
                  <td>120 g (10%)</td>
                  <td style="font-weight:700;color:var(--primary);">1.27 kg</td>
                  <td><span class="badge bg-red">Shortfall</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Unsalted Butter</td>
                  <td>8 kg</td>
                  <td style="color:var(--danger);font-weight:700;">0.8 kg</td>
                  <td>0.8 kg (10%)</td>
                  <td style="font-weight:700;color:var(--primary);">8 kg</td>
                  <td><span class="badge bg-red">Shortfall</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Basmati Rice</td>
                  <td>60 kg</td>
                  <td>88 kg</td>
                  <td>6 kg (10%)</td>
                  <td style="color:var(--t3);">0 kg (covered)</td>
                  <td><span class="badge bg-green">Covered</span></td>
                </tr>
                <tr>
                  <td class="tbl-main">Chicken (Whole)</td>
                  <td>30 kg</td>
                  <td>35.5 kg</td>
                  <td>3 kg (10%)</td>
                  <td style="color:var(--t3);">0 kg (covered)</td>
                  <td><span class="badge bg-green">Covered</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>