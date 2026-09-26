<!-- SUPPLIERS -->
<section id="sec-suppliers" class="section active">
  <div class="sec-hdr"><h2>Suppliers</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-supplier')">+ Add Supplier</button></div>

  <div class="card">
    <div class="card-hdr"><h3>All Suppliers</h3><span style="font-size:12px;color:var(--t3);">6 registered</span></div>
    <div class="tbl-wrap">
      <table>
        <thead><tr><th>Supplier Name</th><th>Category</th><th>Contact Person</th><th>Phone</th><th>Ingredients Supplied</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
          <tr><td class="tbl-main">Negombo Sea Foods</td><td>Meat &amp; Seafood</td><td>Roshan Silva</td><td>077-1234567</td><td style="font-size:13px;color:var(--t2);">Salmon, Prawns, Tuna</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
          <tr><td class="tbl-main">Lakmal &amp; Sons Poultry</td><td>Meat &amp; Seafood</td><td>Lakmal Perera</td><td>071-9876543</td><td style="font-size:13px;color:var(--t2);">Chicken, Lamb, Beef</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
          <tr><td class="tbl-main">Ceylon Agro Exports</td><td>Dry Goods</td><td>Chaminda Ranasinghe</td><td>077-5554433</td><td style="font-size:13px;color:var(--t2);">Rice, Wheat Flour, Spices</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
          <tr><td class="tbl-main">Araliya Foods</td><td>Dairy &amp; Staples</td><td>Nirmala Jayawardena</td><td>076-2223344</td><td style="font-size:13px;color:var(--t2);">Butter, Heavy Cream, Eggs, Coconut Milk</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
          <tr><td class="tbl-main">Global Imports Ltd</td><td>Specialty</td><td>Kevin Fernando</td><td>011-4445566</td><td style="font-size:13px;color:var(--t2);">Cheese, Chocolate</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
          <tr><td class="tbl-main">Fresh Farms Ltd</td><td>Vegetables</td><td>Sunil Hettige</td><td>072-6667788</td><td style="font-size:13px;color:var(--t2);">Lettuce, Tomatoes, Lemon, Mushrooms, Herbs</td><td><span class="badge bg-green">Active</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Deactivate</span></div></td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal-overlay" id="modal-add-supplier" onclick="if(event.target===this)toggleModal('modal-add-supplier')">
    <div class="modal">
      <div class="modal-hdr"><h3>Add Supplier</h3><button class="modal-close" onclick="toggleModal('modal-add-supplier')">✕</button></div>
      <form onsubmit="submitForm(event,'Supplier added!')">
        <div class="form-grid">
          <div class="form-grp form-full"><label>Supplier Name *</label><input type="text" placeholder="e.g. Negombo Sea Foods" required></div>
          <div class="form-grp"><label>Category</label><select><option>Meat &amp; Seafood</option><option>Dairy &amp; Staples</option><option>Vegetables</option><option>Dry Goods</option><option>Specialty</option></select></div>
          <div class="form-grp"><label>Contact Person</label><input type="text" placeholder="Contact name"></div>
          <div class="form-grp"><label>Phone</label><input type="text" placeholder="07X-XXXXXXX"></div>
          <div class="form-grp"><label>Email</label><input type="email" placeholder="supplier@email.lk"></div>
          <div class="form-grp"><label>Address</label><input type="text" placeholder="Supplier address"></div>
        </div>
        <div style="display:flex;gap:10px;margin-top:4px;">
          <button type="submit" class="btn btn-primary">Add Supplier</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-supplier')">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>
