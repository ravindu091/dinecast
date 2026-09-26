/* Procurement Specific JS */

/* -----------------------------------------------
   SIDEBAR NAVIGATION
   Shows one section at a time and updates the
   topbar title to match the selected nav item.
   ----------------------------------------------- */
document.addEventListener('DOMContentLoaded', () => {
  const links    = document.querySelectorAll('.nav-link[data-section]');
  const sections = document.querySelectorAll('.content .section');
  const title    = document.querySelector('.topbar-left h1');

  links.forEach(link => {
    link.addEventListener('click', () => {
      links.forEach(l => l.classList.remove('active'));
      sections.forEach(s => s.classList.remove('active'));

      link.classList.add('active');
      const target = document.getElementById(link.dataset.section);
      if (target) target.classList.add('active');
      if (title && link.dataset.title) title.textContent = link.dataset.title;

      window.scrollTo(0, 0);
    });
  });
});

/* -----------------------------------------------
   PO DETAIL DIALOG
   Reads the clicked order row, its line items and
   the supplier's contact details, then shows the
   lifecycle stepper and the one next action allowed
   for the order's current status.
   ----------------------------------------------- */
const PO_STEPS = ['Issued', 'Received', 'Closed'];

function openPoDetail(trigger) {
  const row    = trigger.closest('tr');
  const cells  = row.children;
  const poRef  = cells[1].textContent.trim();
  const status = cells[7].textContent.trim();
  const supplierName = cells[3].textContent.trim();

  document.getElementById('po-d-title').textContent    = 'Purchase Order ' + poRef;
  document.getElementById('po-d-pr').textContent       = cells[2].textContent.trim();
  document.getElementById('po-d-supplier').textContent = supplierName;
  document.getElementById('po-d-expected').textContent = cells[6].textContent.trim();
  document.getElementById('po-d-status').textContent   = status;
  document.getElementById('po-d-total').textContent    = cells[5].textContent.trim();

  // Supplier contact comes from the Suppliers table
  const supplierRow = [...document.querySelectorAll('#sec-suppliers tbody tr')]
    .find(r => r.children[0].textContent.trim() === supplierName);
  document.getElementById('po-d-contact').textContent = supplierRow ? supplierRow.children[2].textContent : '—';
  document.getElementById('po-d-phone').textContent   = supplierRow ? supplierRow.children[3].textContent : '—';

  // Line items come from the order's expandable detail row
  const lines = document.getElementById('po-d-lines');
  lines.innerHTML = '';
  const detail = row.nextElementSibling;
  if (detail && detail.classList.contains('expand-row')) {
    detail.querySelectorAll('table > tbody > tr').forEach(src => {
      const [name, qty, price] = [...src.children].map(td => td.textContent.trim());
      const [amount, uom] = qty.split(' ');
      const tr = document.createElement('tr');
      [name, amount, uom, price.split('/')[0]].forEach(text => {
        const td = document.createElement('td');
        td.textContent = text;
        tr.appendChild(td);
      });
      lines.appendChild(tr);
    });
  }

  // Stepper: steps before the current one are done; a closed order is fully done
  const current  = PO_STEPS.indexOf(status);
  const finished = current === PO_STEPS.length - 1;
  document.querySelectorAll('#po-d-stepper .po-step').forEach((step, i) => {
    step.classList.toggle('done', i < current || finished);
    step.classList.toggle('current', i === current && !finished);
  });

  // Only the next manual step is offered
  const actions = document.getElementById('po-d-actions');
  actions.innerHTML = '';
  const next = { Issued: 'Mark as Received', Received: 'Mark as Closed' }[status];
  if (next) {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'btn btn-primary';
    btn.textContent = next;
    btn.addEventListener('click', () => {
      showToast(poRef + (status === 'Issued' ? ' marked as Received!' : ' closed.'));
      toggleModal('modal-po-detail');
    });
    actions.appendChild(btn);
  }
  const close = document.createElement('button');
  close.type = 'button';
  close.className = 'btn btn-outline';
  close.textContent = 'Close';
  close.addEventListener('click', () => toggleModal('modal-po-detail'));
  actions.appendChild(close);

  toggleModal('modal-po-detail');
}
