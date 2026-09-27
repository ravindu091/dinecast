<section id="sec-pr" class="section">
        <div class="sec-hdr"><h2>Purchase Requisitions</h2><button class="btn btn-primary" onclick="showToast('New PR draft created!')">+ New PR</button></div>

        <div class="stats">
          <div class="stat c-gray"><div class="stat-ico">📝</div><div class="stat-val">2</div><div class="stat-lbl">Drafts</div></div>
          <div class="stat c-orange"><div class="stat-ico">⏳</div><div class="stat-val">4</div><div class="stat-lbl">Submitted — Awaiting Approval</div></div>
          <div class="stat c-red"><div class="stat-ico">❌</div><div class="stat-val">1</div><div class="stat-lbl">Rejected — Needs Rework</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">6</div><div class="stat-lbl">Approved</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Purchase Requisitions</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>PR Ref</th><th>Items</th><th>Linked Forecast / Event</th><th>Created</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr>
                  <td><span class="pr-ref">PR-0043</span></td>
                  <td style="font-size:13px;color:var(--t2);">A, B, C</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Jan 1–7 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">01/08/2026</td>
                  <td><span class="badge bg-orange">Submitted</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0044</span></td>
                  <td style="font-size:13px;color:var(--t2);">A, B</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Jan 10–15 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">05/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0045</span></td>
                  <td style="font-size:13px;color:var(--t2);">X, Y, Z</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Jan 28–Feb 1</a></td>
                  <td style="font-size:12px;color:var(--t3);">06/08/2026</td>
                  <td><span class="badge bg-gray">Draft</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act" onclick="showToast('PR submitted for approval!')">Submit</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0046</span></td>
                  <td style="font-size:13px;color:var(--t2);">Q, R, S, T</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Feb 7–14 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">07/08/2026</td>
                  <td><span class="badge bg-red">Rejected</span></td>
                  <td><div class="acts"><span class="act">View Remarks</span><span class="act">Redo</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0047</span></td>
                  <td style="font-size:13px;color:var(--t2);">L, M</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Mar 5–9 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">08/08/2026</td>
                  <td><span class="badge bg-green">Approved</span></td>
                  <td><div class="acts"><span class="act">View</span></div></td>
                </tr>
                <tr>
                  <td><span class="pr-ref">PR-0048</span></td>
                  <td style="font-size:13px;color:var(--t2);">Z, Q, B</td>
                  <td><a href="#" style="color:var(--primary);font-size:13px;">Apr 13–14 Forecast</a></td>
                  <td style="font-size:12px;color:var(--t3);">09/08/2026</td>
                  <td><span class="badge bg-gray">Draft</span></td>
                  <td><div class="acts"><span class="act">Edit</span><span class="act" onclick="showToast('PR submitted for approval!')">Submit</span></div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>