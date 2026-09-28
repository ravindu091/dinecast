<!-- REQUISITIONS -->
<section id="sec-requisitions" class="section active">
  <div class="sec-hdr"><h2>Requisitions</h2></div>

  <!-- KPI Cards -->
  <div class="stats pm-kpi-grid">

    <!-- Pending Approval -->
    <article class="pm-kpi pm-kpi-amber">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Pending Approval</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">3</div>
      <div class="pm-kpi-desc">Waiting for your decision</div>
    </article>

    <!-- Approved -->
    <article class="pm-kpi pm-kpi-green">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Approved</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-6"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">5</div>
      <div class="pm-kpi-desc">Cleared for purchase orders</div>
    </article>

    <!-- Rejected -->
    <article class="pm-kpi pm-kpi-red">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Rejected</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9 9l6 6M15 9l-6 6"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">1</div>
      <div class="pm-kpi-desc">Returned with remarks</div>
    </article>

  </div>

  <div class="card">
    <div class="card-hdr"><h3>Purchase Requisitions</h3><p style="font-size:11.5px;color:var(--t3);">Review item quantities, current stock, and forecast basis before approving</p></div>
    <div class="tbl-wrap">
      <table>
        <thead><tr><th></th><th>PR Ref</th><th>Raised By</th><th>Items</th><th>Linked Event</th><th>Est. Value</th><th>Submitted</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
          <tr>
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0048')">▶</button></td>
            <td><span class="pr-ref">PR-0048</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Chicken, Rice, Coconut Milk</td>
            <td style="font-size:13px;font-weight:600;">Corporate Lunch</td>
            <td style="font-weight:700;">Rs. 46,250</td>
            <td style="font-size:12px;color:var(--t3);">10/08/2026</td>
            <td><span class="badge bg-green">Approved</span></td>
            <td><div class="acts"><span class="act" onclick="toggleModal('modal-create-po')">Create POs</span></div></td>
          </tr>
          <tr class="expand-row" id="pr-detail-0048">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PR-0048 Item Detail</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                    <tbody>
                      <tr><td>Chicken Breast</td><td>55 kg</td><td style="color:var(--warning);">30 kg</td><td style="font-weight:700;">25 kg</td><td>Rs. 850/kg</td><td style="font-weight:700;">Rs. 21,250</td></tr>
                      <tr><td>Basmati Rice</td><td>80 kg</td><td style="color:var(--danger);">30 kg</td><td style="font-weight:700;">50 kg</td><td>Rs. 320/kg</td><td style="font-weight:700;">Rs. 16,000</td></tr>
                      <tr><td>Coconut Milk</td><td>26 L</td><td style="color:var(--danger);">6 L</td><td style="font-weight:700;">20 L</td><td>Rs. 450/L</td><td style="font-weight:700;">Rs. 9,000</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 46,250</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0047')">▶</button></td>
            <td><span class="pr-ref">PR-0047</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Beef, Mushrooms, Cream</td>
            <td style="font-size:13px;font-weight:600;">Gov Dinner</td>
            <td style="font-weight:700;">Rs. 10,100</td>
            <td style="font-size:12px;color:var(--t3);">09/08/2026</td>
            <td><span class="badge bg-orange">Pending</span></td>
            <td><div class="acts"><span class="act" onclick="showToast('PR-0047 Approved!')">Approve</span><span class="act del" onclick="toggleModal('modal-reject')">Reject</span></div></td>
          </tr>
          <tr class="expand-row" id="pr-detail-0047">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PR-0047 Item Detail</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                    <tbody>
                      <tr><td>Beef Tenderloin</td><td>12 kg</td><td style="color:var(--warning);">9 kg</td><td style="font-weight:700;">3 kg</td><td>Rs. 2,400/kg</td><td style="font-weight:700;">Rs. 7,200</td></tr>
                      <tr><td>Button Mushrooms</td><td>5 kg</td><td style="color:var(--warning);">3 kg</td><td style="font-weight:700;">2 kg</td><td>Rs. 900/kg</td><td style="font-weight:700;">Rs. 1,800</td></tr>
                      <tr><td>Heavy Cream</td><td>4 L</td><td style="color:var(--warning);">3 L</td><td style="font-weight:700;">1 L</td><td>Rs. 1,100/L</td><td style="font-weight:700;">Rs. 1,100</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 10,100</td></tr></tfoot>
                  </table>
                </div>
                <div style="display:flex;gap:10px;margin-top:10px;">
                  <button class="btn btn-primary btn-sm" onclick="showToast('PR-0047 Approved!')">Approve</button>
                  <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">Reject with Remarks</button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0046')">▶</button></td>
            <td><span class="pr-ref">PR-0046</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Chicken, Lamb</td>
            <td style="font-size:13px;font-weight:600;">Anniversary – Fernando</td>
            <td style="font-weight:700;">Rs. 48,000</td>
            <td style="font-size:12px;color:var(--t3);">08/08/2026</td>
            <td><span class="badge bg-green">Approved</span></td>
            <td style="font-size:12px;color:var(--t3);">PO-0020 issued</td>
          </tr>
          <tr class="expand-row" id="pr-detail-0046">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PR-0046 Item Detail</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                    <tbody>
                      <tr><td>Chicken Breast</td><td>52 kg</td><td style="color:var(--danger);">12 kg</td><td style="font-weight:700;">40 kg</td><td>Rs. 850/kg</td><td style="font-weight:700;">Rs. 34,000</td></tr>
                      <tr><td>Lamb Shoulder</td><td>10 kg</td><td style="color:var(--danger);">0 kg</td><td style="font-weight:700;">10 kg</td><td>Rs. 1,400/kg</td><td style="font-weight:700;">Rs. 14,000</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 48,000</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><span class="pr-ref">PR-0045</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Prawns, Cream, Cheese</td>
            <td style="font-size:13px;font-weight:600;">Tech Conference</td>
            <td style="font-weight:700;">Rs. 28,600</td>
            <td style="font-size:12px;color:var(--t3);">07/08/2026</td>
            <td><span class="badge bg-red">Rejected</span></td>
            <td><div class="acts"><span class="act" onclick="toggleModal('modal-remarks')">View Remarks</span></div></td>
          </tr>
          <tr>
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0044')">▶</button></td>
            <td><span class="pr-ref">PR-0044</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Lettuce, Eggs, Tomatoes</td>
            <td style="font-size:13px;font-weight:600;">Birthday – Silva</td>
            <td style="font-weight:700;">Rs. 3,264</td>
            <td style="font-size:12px;color:var(--t3);">06/08/2026</td>
            <td><span class="badge bg-orange">Pending</span></td>
            <td><div class="acts"><span class="act" onclick="showToast('PR-0044 Approved!')">Approve</span><span class="act del" onclick="toggleModal('modal-reject')">Reject</span></div></td>
          </tr>
          <tr class="expand-row" id="pr-detail-0044">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PR-0044 Item Detail</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                    <tbody>
                      <tr><td>Romaine Lettuce</td><td>4 kg</td><td style="color:var(--warning);">3.2 kg</td><td style="font-weight:700;">0.8 kg</td><td>Rs. 180/kg</td><td style="font-weight:700;">Rs. 144</td></tr>
                      <tr><td>Eggs</td><td>60 pcs</td><td style="color:var(--danger);">20 pcs</td><td style="font-weight:700;">40 pcs</td><td>Rs. 45/pc</td><td style="font-weight:700;">Rs. 1,800</td></tr>
                      <tr><td>Tomatoes</td><td>10 kg</td><td style="color:var(--danger);">4 kg</td><td style="font-weight:700;">6 kg</td><td>Rs. 220/kg</td><td style="font-weight:700;">Rs. 1,320</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 3,264</td></tr></tfoot>
                  </table>
                </div>
                <div style="display:flex;gap:10px;margin-top:10px;">
                  <button class="btn btn-primary btn-sm" onclick="showToast('PR-0044 Approved!')">Approve</button>
                  <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">Reject with Remarks</button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'pr-detail-0043')">▶</button></td>
            <td><span class="pr-ref">PR-0043</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Salmon, Butter, Lemon</td>
            <td style="font-size:13px;font-weight:600;">Wedding – Perera</td>
            <td style="font-weight:700;">Rs. 91,240</td>
            <td style="font-size:12px;color:var(--t3);">05/08/2026</td>
            <td><span class="badge bg-orange">Pending</span></td>
            <td><div class="acts"><span class="act" onclick="showToast('PR-0043 Approved!')">Approve</span><span class="act del" onclick="toggleModal('modal-reject')">Reject</span></div></td>
          </tr>
          <tr class="expand-row" id="pr-detail-0043">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PR-0043 Item Detail</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Ingredient</th><th>Forecast Need</th><th>Current Stock</th><th>PR Qty</th><th>Est. Unit Cost</th><th>Est. Total</th></tr></thead>
                    <tbody>
                      <tr><td>Fresh Salmon Fillet</td><td>48 kg</td><td style="color:var(--danger);">2.5 kg</td><td style="font-weight:700;">45.5 kg</td><td>Rs. 1,800/kg</td><td style="font-weight:700;">Rs. 81,900</td></tr>
                      <tr><td>Unsalted Butter</td><td>8 kg</td><td style="color:var(--danger);">0.8 kg</td><td style="font-weight:700;">7.2 kg</td><td>Rs. 1,200/kg</td><td style="font-weight:700;">Rs. 8,640</td></tr>
                      <tr><td>Lemon</td><td>40 pcs</td><td style="color:var(--danger);">12 pcs</td><td style="font-weight:700;">28 pcs</td><td>Rs. 25/pc</td><td style="font-weight:700;">Rs. 700</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="5">Total</td><td>Rs. 91,240</td></tr></tfoot>
                  </table>
                </div>
                <div style="display:flex;gap:10px;margin-top:10px;">
                  <button class="btn btn-primary btn-sm" onclick="showToast('PR-0043 Approved!')">Approve</button>
                  <button class="btn btn-outline btn-sm" onclick="toggleModal('modal-reject')">Reject with Remarks</button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><span class="pr-ref">PR-0042</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Salmon, Prawns, Rice, Spices</td>
            <td style="font-size:13px;font-weight:600;">Charity Gala</td>
            <td style="font-weight:700;">Rs. 65,900</td>
            <td style="font-size:12px;color:var(--t3);">02/08/2026</td>
            <td><span class="badge bg-green">Approved</span></td>
            <td style="font-size:12px;color:var(--t3);">PO-0018, PO-0019 issued</td>
          </tr>
          <tr>
            <td></td>
            <td><span class="pr-ref">PR-0041</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Coconut Milk, Eggs</td>
            <td style="font-size:13px;font-weight:600;">School Prize Day</td>
            <td style="font-weight:700;">Rs. 11,700</td>
            <td style="font-size:12px;color:var(--t3);">01/08/2026</td>
            <td><span class="badge bg-green">Approved</span></td>
            <td style="font-size:12px;color:var(--t3);">PO-0017 issued</td>
          </tr>
          <tr>
            <td></td>
            <td><span class="pr-ref">PR-0040</span></td>
            <td>Sudath B. (Kitchen Mgr)</td>
            <td style="font-size:13px;color:var(--t2);">Lettuce, Tomatoes</td>
            <td style="font-size:13px;font-weight:600;">Staff Welfare Lunch</td>
            <td style="font-weight:700;">Rs. 2,660</td>
            <td style="font-size:12px;color:var(--t3);">28/07/2026</td>
            <td><span class="badge bg-green">Approved</span></td>
            <td style="font-size:12px;color:var(--t3);">PO-0016 issued</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</section>

<!-- Reject Modal (a copy also lives on the Home page) -->
<div class="modal-overlay" id="modal-reject" onclick="if(event.target===this)toggleModal('modal-reject')">
  <div class="modal">
    <div class="modal-hdr"><h3>Reject PR with Remarks</h3><button class="modal-close" onclick="toggleModal('modal-reject')">✕</button></div>
    <form onsubmit="submitForm(event,'PR Rejected. Kitchen Manager notified.')">
      <div class="form-grp">
        <label>Rejection Remarks *</label>
        <textarea placeholder="Explain why this PR is rejected (will be visible to the Kitchen Manager)…" style="height:100px;" required></textarea>
      </div>
      <div style="display:flex;gap:10px;margin-top:12px;">
        <button type="submit" class="btn btn-primary" style="background:var(--danger);">Confirm Rejection</button>
        <button type="button" class="btn btn-outline" onclick="toggleModal('modal-reject')">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Rejection Remarks Modal -->
<div class="modal-overlay" id="modal-remarks" onclick="if(event.target===this)toggleModal('modal-remarks')">
  <div class="modal">
    <div class="modal-hdr"><h3>Rejection Remarks — PR-0045</h3><button class="modal-close" onclick="toggleModal('modal-remarks')">✕</button></div>
    <div class="po-meta">
      <div><span>Linked Event</span>Tech Conference</div>
      <div><span>Raised By</span>Sudath B. (Kitchen Mgr)</div>
      <div><span>Rejected By</span>Kavindu Silva</div>
      <div><span>Rejected On</span>07/08/2026</div>
    </div>
    <div class="remark-box">The client has not confirmed the final headcount for the Tech Conference. The prawn and cheese quantities assume 150 guests. Please resubmit once the confirmed guest count is received.</div>
    <div style="display:flex;gap:10px;margin-top:16px;">
      <button type="button" class="btn btn-outline" onclick="toggleModal('modal-remarks')">Close</button>
    </div>
  </div>
</div>

<!-- Create POs Modal: previews the one-PO-per-supplier split before committing -->
<div class="modal-overlay" id="modal-create-po" onclick="if(event.target===this)toggleModal('modal-create-po')">
  <div class="modal">
    <div class="modal-hdr"><h3>Create Purchase Orders — PR-0048</h3><button class="modal-close" onclick="toggleModal('modal-create-po')">✕</button></div>
    <p class="po-split-intro">PR-0048 (Corporate Lunch) was approved as one requisition. Its ingredients come from 3 suppliers, so it will be split into 3 purchase orders, one per supplier. Review them before confirming.</p>
      <div class="po-split">
        <div class="po-split-hdr"><b>PO-0021 &nbsp;·&nbsp; Lakmal &amp; Sons Poultry</b><span>Lakmal Perera &nbsp;·&nbsp; 071-9876543</span></div>
        <div class="tbl-wrap" style="margin:0;">
          <table>
            <thead><tr><th>Ingredient</th><th>Qty</th><th>UOM</th><th>Unit Price</th></tr></thead>
            <tbody>
              <tr><td>Chicken Breast</td><td>25</td><td>kg</td><td>Rs. 850</td></tr>
            </tbody>
            <tfoot><tr style="font-weight:700;"><td colspan="3">Subtotal</td><td>Rs. 21,250</td></tr></tfoot>
          </table>
        </div>
      </div>
      <div class="po-split">
        <div class="po-split-hdr"><b>PO-0022 &nbsp;·&nbsp; Ceylon Agro Exports</b><span>Chaminda Ranasinghe &nbsp;·&nbsp; 077-5554433</span></div>
        <div class="tbl-wrap" style="margin:0;">
          <table>
            <thead><tr><th>Ingredient</th><th>Qty</th><th>UOM</th><th>Unit Price</th></tr></thead>
            <tbody>
              <tr><td>Basmati Rice</td><td>50</td><td>kg</td><td>Rs. 320</td></tr>
            </tbody>
            <tfoot><tr style="font-weight:700;"><td colspan="3">Subtotal</td><td>Rs. 16,000</td></tr></tfoot>
          </table>
        </div>
      </div>
      <div class="po-split">
        <div class="po-split-hdr"><b>PO-0023 &nbsp;·&nbsp; Araliya Foods</b><span>Nirmala Jayawardena &nbsp;·&nbsp; 076-2223344</span></div>
        <div class="tbl-wrap" style="margin:0;">
          <table>
            <thead><tr><th>Ingredient</th><th>Qty</th><th>UOM</th><th>Unit Price</th></tr></thead>
            <tbody>
              <tr><td>Coconut Milk</td><td>20</td><td>L</td><td>Rs. 450</td></tr>
            </tbody>
            <tfoot><tr style="font-weight:700;"><td colspan="3">Subtotal</td><td>Rs. 9,000</td></tr></tfoot>
          </table>
        </div>
      </div>
    <div class="po-split-total"><span>Total across 3 POs</span><b>Rs. 46,250</b></div>
    <div style="display:flex;gap:10px;margin-top:16px;">
      <button type="button" class="btn btn-primary" onclick="showToast('3 POs created for PR-0048: PO-0021, PO-0022, PO-0023');toggleModal('modal-create-po')">Create 3 Purchase Orders</button>
      <button type="button" class="btn btn-outline" onclick="toggleModal('modal-create-po')">Cancel</button>
    </div>
  </div>
</div>
