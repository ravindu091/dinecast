<section id="sec-attendance" class="section">
        <div class="sec-hdr"><h2>Attendance History</h2><button class="btn btn-primary" onclick="toggleModal('modal-log-attendance')">+ Log Attendance</button></div>

        <div class="card">
          <div class="card-hdr"><h3>Registered vs Actual Attendance</h3><p style="font-size:11.5px;color:var(--t3);">Used to auto-refine attendance factors</p></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event</th><th>Date</th><th>Registered</th><th>Actual</th><th>Variance</th><th>Att. Factor (Applied)</th><th>Revised Factor</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – Perera</td><td>01/07/26</td><td>180</td><td style="font-weight:700;">186</td><td><span class="var-val v-pos">+3.3%</span></td><td>80%</td><td style="color:var(--success);font-weight:700;">103%</td></tr>
                <tr><td class="tbl-main">Institutional Lunch</td><td>08/07/26</td><td>300</td><td style="font-weight:700;">222</td><td><span class="var-val v-neg">-26.0%</span></td><td>80%</td><td style="color:var(--danger);font-weight:700;">74%</td></tr>
                <tr><td class="tbl-main">Gov Dinner – Ministry</td><td>15/07/26</td><td>75</td><td style="font-weight:700;">67</td><td><span class="var-val v-neg">-10.7%</span></td><td>80%</td><td style="color:var(--warning);font-weight:700;">89%</td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board</td><td>20/07/26</td><td>500</td><td style="font-weight:700;">485</td><td><span class="var-val v-neg">-3.0%</span></td><td>80%</td><td style="color:var(--warning);font-weight:700;">97%</td></tr>
                <tr><td class="tbl-main">Wedding Reception (Aug 1)</td><td>01/08/26</td><td>200</td><td style="font-weight:700;">195</td><td><span class="var-val v-neg">-2.5%</span></td><td>80%</td><td style="color:var(--warning);font-weight:700;">97.5%</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Log Attendance Modal -->
        <div class="modal-overlay" id="modal-log-attendance" onclick="if(event.target===this)toggleModal('modal-log-attendance')">
          <div class="modal">
            <div class="modal-hdr"><h3>Log Actual Attendance</h3><button class="modal-close" onclick="toggleModal('modal-log-attendance')">✕</button></div>
            <form onsubmit="submitForm(event,'Attendance logged!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Event *</label><select required><option>Wedding Reception – Perera (12 Aug)</option><option>Tech Conference – NovaTech (16 Aug)</option></select></div>
                <div class="form-grp"><label>Registered Guest Count</label><input type="number" placeholder="Auto-filled" readonly></div>
                <div class="form-grp"><label>Actual Guests Served *</label><input type="number" placeholder="e.g. 186" required></div>
                <div class="form-grp form-full"><label>Notes</label><textarea placeholder="Any notes on variance…"></textarea></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Save Attendance</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-log-attendance')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>