/* ===============================================
   RECEIVE STOCK FORM SUBMIT (Store)
   =============================================== */
function submitReceiveStock(event) {
  event.preventDefault();
  showToast('✓ Stock received and inventory updated successfully!');
  event.target.reset();
}
