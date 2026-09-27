      <section id="sec-params" class="section active">
        <div class="sec-hdr"><h2>System Parameters</h2></div>
        <div class="grid-2">
          <div class="card">
            <div class="card-hdr"><h3>Forecasting Parameters</h3></div>
            <form onsubmit="submitForm(event,'Parameters saved!')">
              <div class="form-grid">
                <div class="form-grp">
                  <label>Default Attendance Factor (%)</label>
                  <input type="number" value="80" min="0" max="100" step="1">
                  <small style="color:var(--t3);font-size:11px;">Applied to registered guest counts for confirmed events.</small>
                </div>
                <div class="form-grp">
                  <label>Tentative Event Factor (%)</label>
                  <input type="number" value="60" min="0" max="100" step="1">
                  <small style="color:var(--t3);font-size:11px;">Applied to tentative events.</small>
                </div>
                <div class="form-grp">
                  <label>Safety Stock Percentage (%)</label>
                  <input type="number" value="10" min="0" max="50" step="1">
                  <small style="color:var(--t3);font-size:11px;">Added to PR quantities as buffer.</small>
                </div>
                <div class="form-grp">
                  <label>Default Wastage Factor (%)</label>
                  <input type="number" value="8" min="0" max="50" step="1">
                  <small style="color:var(--t3);font-size:11px;">Applied globally unless overridden per ingredient.</small>
                </div>
              </div>
              <div class="form-grp" style="margin-top:8px;">
                <label>Walk-in Forecast Lookback (weeks)</label>
                <input type="number" value="12" min="4" max="52" step="1" style="max-width:180px;">
                <small style="color:var(--t3);font-size:11px;">Historical weeks used for day-of-week walk-in average.</small>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-top:12px;">Save Parameters</button>
            </form>
          </div>

          <div class="card">
            <div class="card-hdr"><h3>Wastage Factors by Category</h3><button class="btn btn-outline btn-sm" onclick="showToast('Category added!')">+ Add Category</button></div>
            <div class="tbl-wrap">
              <table>
                <thead><tr><th>Category</th><th>Wastage %</th><th>Actions</th></tr></thead>
                <tbody>
                  <tr><td class="tbl-main">Meat &amp; Seafood</td><td><input type="number" value="12" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Dairy</td><td><input type="number" value="8" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Vegetables &amp; Herbs</td><td><input type="number" value="15" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Dry Goods</td><td><input type="number" value="3" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                  <tr><td class="tbl-main">Spices &amp; Herbs</td><td><input type="number" value="5" style="width:60px;padding:4px 8px;border:1.5px solid var(--border);border-radius:6px;font-size:13px;"> %</td><td><div class="acts"><span class="act" onclick="showToast('Saved!')">Save</span></div></td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
