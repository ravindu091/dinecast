<!-- PURCHASE ORDERS -->
<section id="sec-orders" class="section active">
  <div class="sec-hdr"><h2>Purchase Orders</h2></div>

  <!-- KPI Cards -->
  <div class="stats pm-kpi-grid">

    <!-- Issued -->
    <article class="pm-kpi pm-kpi-blue">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Issued</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7V8zM5 21a2 2 0 100-4 2 2 0 000 4zm14 0a2 2 0 100-4 2 2 0 000 4z"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">3</div>
      <div class="pm-kpi-desc">Sent to suppliers, awaiting delivery</div>
    </article>

    <!-- Received -->
    <article class="pm-kpi pm-kpi-teal">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Received</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-6"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">1</div>
      <div class="pm-kpi-desc">Delivered, not yet closed</div>
    </article>

    <!-- Closed -->
    <article class="pm-kpi pm-kpi-gray">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Closed</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V7a4 4 0 018 0v4"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value">1</div>
      <div class="pm-kpi-desc">Completed orders</div>
    </article>

    <!-- Total PO Value -->
    <article class="pm-kpi pm-kpi-gray">
      <div class="pm-kpi-top">
        <span class="pm-kpi-label">Total PO Value</span>
        <span class="pm-kpi-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></svg>
        </span>
      </div>
      <div class="pm-kpi-value pm-kpi-value-sm">Rs. 128,260</div>
      <div class="pm-kpi-desc">Across all purchase orders</div>
    </article>

  </div>

  <div class="card">
    <div class="card-hdr"><h3>All Purchase Orders</h3></div>
    <div class="tbl-wrap">
      <table>
        <thead><tr><th></th><th>PO Ref</th><th>PR Ref</th><th>Supplier</th><th>Items</th><th>Total Value</th><th>Expected</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
          <tr data-contact="Lakmal Perera" data-phone="071-9876543">
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0020')">▶</button></td>
            <td><span class="pr-ref">PO-0020</span></td>
            <td><span class="tbl-id">PR-0046</span></td>
            <td>Lakmal &amp; Sons Poultry</td>
            <td style="font-size:13px;color:var(--t2);">Chicken, Lamb</td>
            <td style="font-weight:700;">Rs. 48,000</td>
            <td>13/08/26</td>
            <td><span class="badge bg-blue">Issued</span></td>
            <td><div class="acts"><span class="act" onclick="openPoDetail(this)">View</span><span class="act" onclick="showToast('PO-0020 marked as Received!')">Mark Received</span></div></td>
          </tr>
          <tr class="expand-row" id="po-detail-0020">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PO-0020 — Lakmal &amp; Sons Poultry</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                    <tbody>
                      <tr><td>Chicken Breast</td><td>40 kg</td><td>Rs. 850/kg</td><td>Rs. 34,000</td></tr>
                      <tr><td>Lamb Shoulder</td><td>10 kg</td><td>Rs. 1,400/kg</td><td>Rs. 14,000</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 48,000</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <tr data-contact="Chaminda Ranasinghe" data-phone="077-5554433">
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0019')">▶</button></td>
            <td><span class="pr-ref">PO-0019</span></td>
            <td><span class="tbl-id">PR-0042</span></td>
            <td>Ceylon Agro Exports</td>
            <td style="font-size:13px;color:var(--t2);">Rice, Spices</td>
            <td style="font-weight:700;">Rs. 20,300</td>
            <td>15/08/26</td>
            <td><span class="badge bg-blue">Issued</span></td>
            <td><div class="acts"><span class="act" onclick="openPoDetail(this)">View</span><span class="act" onclick="showToast('PO-0019 marked as Received!')">Mark Received</span></div></td>
          </tr>
          <tr class="expand-row" id="po-detail-0019">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PO-0019 — Ceylon Agro Exports</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                    <tbody>
                      <tr><td>Basmati Rice</td><td>40 kg</td><td>Rs. 320/kg</td><td>Rs. 12,800</td></tr>
                      <tr><td>Mixed Spices</td><td>5 kg</td><td>Rs. 1,500/kg</td><td>Rs. 7,500</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 20,300</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <tr data-contact="Roshan Silva" data-phone="077-1234567">
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0018')">▶</button></td>
            <td><span class="pr-ref">PO-0018</span></td>
            <td><span class="tbl-id">PR-0042</span></td>
            <td>Negombo Sea Foods</td>
            <td style="font-size:13px;color:var(--t2);">Salmon, Prawns</td>
            <td style="font-weight:700;">Rs. 45,600</td>
            <td>14/08/26</td>
            <td><span class="badge bg-blue">Issued</span></td>
            <td><div class="acts"><span class="act" onclick="openPoDetail(this)">View</span><span class="act" onclick="showToast('PO-0018 marked as Received!')">Mark Received</span></div></td>
          </tr>
          <tr class="expand-row" id="po-detail-0018">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PO-0018 — Negombo Sea Foods</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                    <tbody>
                      <tr><td>Fresh Salmon Fillet</td><td>20 kg</td><td>Rs. 1,800/kg</td><td>Rs. 36,000</td></tr>
                      <tr><td>Fresh Prawns</td><td>8 kg</td><td>Rs. 1,200/kg</td><td>Rs. 9,600</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 45,600</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <tr data-contact="Nirmala Jayawardena" data-phone="076-2223344">
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0017')">▶</button></td>
            <td><span class="pr-ref">PO-0017</span></td>
            <td><span class="tbl-id">PR-0041</span></td>
            <td>Araliya Foods</td>
            <td style="font-size:13px;color:var(--t2);">Coconut Milk, Eggs</td>
            <td style="font-weight:700;">Rs. 11,700</td>
            <td>10/08/26</td>
            <td><span class="badge bg-teal">Received</span></td>
            <td><div class="acts"><span class="act" onclick="openPoDetail(this)">View</span><span class="act" onclick="showToast('PO-0017 closed.')">Close PO</span></div></td>
          </tr>
          <tr class="expand-row" id="po-detail-0017">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PO-0017 — Araliya Foods</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                    <tbody>
                      <tr><td>Coconut Milk</td><td>20 L</td><td>Rs. 450/L</td><td>Rs. 9,000</td></tr>
                      <tr><td>Eggs</td><td>60 pcs</td><td>Rs. 45/pc</td><td>Rs. 2,700</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 11,700</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <tr data-contact="Sunil Hettige" data-phone="072-6667788">
            <td><button class="expand-btn" onclick="toggleExpandRow(this,'po-detail-0016')">▶</button></td>
            <td><span class="pr-ref">PO-0016</span></td>
            <td><span class="tbl-id">PR-0040</span></td>
            <td>Fresh Farms Ltd</td>
            <td style="font-size:13px;color:var(--t2);">Lettuce, Tomatoes</td>
            <td style="font-weight:700;">Rs. 2,660</td>
            <td>31/07/26</td>
            <td><span class="badge bg-gray">Closed</span></td>
            <td><div class="acts"><span class="act" onclick="openPoDetail(this)">View</span></div></td>
          </tr>
          <tr class="expand-row" id="po-detail-0016">
            <td colspan="9">
              <div class="expand-inner">
                <div class="expand-lbl">PO-0016 — Fresh Farms Ltd</div>
                <div class="tbl-wrap" style="margin:0;">
                  <table>
                    <thead><tr><th>Item</th><th>Ordered Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                    <tbody>
                      <tr><td>Romaine Lettuce</td><td>5 kg</td><td>Rs. 180/kg</td><td>Rs. 900</td></tr>
                      <tr><td>Tomatoes</td><td>8 kg</td><td>Rs. 220/kg</td><td>Rs. 1,760</td></tr>
                    </tbody>
                    <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td>Rs. 2,660</td></tr></tfoot>
                  </table>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- PO Detail Modal (filled by openPoDetail in procurement.js) -->
<div class="modal-overlay" id="modal-po-detail" onclick="if(event.target===this)toggleModal('modal-po-detail')">
  <div class="modal">
    <div class="modal-hdr"><h3 id="po-d-title">Purchase Order</h3><button class="modal-close" onclick="toggleModal('modal-po-detail')">✕</button></div>
    <div class="po-stepper" id="po-d-stepper">
      <div class="po-step" data-step="Issued"><span class="po-dot">1</span>Issued</div>
      <div class="po-step" data-step="Received"><span class="po-dot">2</span>Received</div>
      <div class="po-step" data-step="Closed"><span class="po-dot">3</span>Closed</div>
    </div>
    <div class="po-meta">
      <div><span>Supplier</span><b id="po-d-supplier"></b></div>
      <div><span>From PR</span><b id="po-d-pr"></b></div>
      <div><span>Contact Person</span><b id="po-d-contact"></b></div>
      <div><span>Phone</span><b id="po-d-phone"></b></div>
      <div><span>Expected Delivery</span><b id="po-d-expected"></b></div>
      <div><span>Status</span><b id="po-d-status"></b></div>
    </div>
    <div class="tbl-wrap" style="margin:0;">
      <table>
        <thead><tr><th>Ingredient</th><th>Qty</th><th>UOM</th><th>Unit Price</th></tr></thead>
        <tbody id="po-d-lines"></tbody>
        <tfoot><tr style="font-weight:700;"><td colspan="3">Total</td><td id="po-d-total"></td></tr></tfoot>
      </table>
    </div>
    <div style="display:flex;gap:10px;margin-top:16px;" id="po-d-actions"></div>
  </div>
</div>
