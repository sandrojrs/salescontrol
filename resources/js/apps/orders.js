/**
 *
 * Orders
 * A very basic and static implementation for the application mostly to show different layouts it has. Edit this class according to your project needs.
 * Implemented with the help of list.js and with a static data from json/orders.json file.
 *
 */

class Orders {
  get options() {
    return {
      emptyThumb: Helpers.UrlFix('/img/profile/profile-11.webp'),
    };
  }

  constructor(options = {}) {
    this.settings = Object.assign(this.options, options);

    this.orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
    this.deleteConfirmModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));

    Helpers.FetchJSON(Helpers.UrlFix('/json/contacts.json'), (data) => {
      this.orders = data.map((d) => {
        return {
          ...d,
          thumb: Helpers.UrlFix(d.thumb),
        };
      });
      this._init();
    });
    console.log(orders, 'teste')
  }

  _init() {
    this.orderContainer = document.querySelector('#order .list');
    this.currentItem = null;
    this.listjs = null;
    this.deletingMultiple = false;
    this._addListeners();
    this._initListjs();
    this._initProfileUpload();
    this._initGroupSelect();
    this._initCheckAll();
  }

  _addListeners() {
    this.orderContainer.addEventListener('click', this._onContainerClick.bind(this));
    document.getElementById('newOrderButton') && document.getElementById('newOrderButton').addEventListener('click', this._showAddModal.bind(this));
    document.getElementById('deleteOrder') && document.getElementById('deleteOrder').addEventListener('click', this._deleteOrder.bind(this));
    document.getElementById('addOrder') && document.getElementById('addOrder').addEventListener('click', this._addOrder.bind(this));
    document.getElementById('saveOrder') && document.getElementById('saveOrder').addEventListener('click', this._saveOrder.bind(this));
    document.getElementById('deleteConfirmButton') &&
      document.getElementById('deleteConfirmButton').addEventListener('click', this._deleteOrderConfirm.bind(this));
    document.getElementById('deleteChecked') && document.getElementById('deleteChecked').addEventListener('click', this._deleteChecked.bind(this));
  }

  // Select2 plugin initialization in the add/edit modal
  _initGroupSelect() {
    if (jQuery().select2) {
      jQuery('#orderGroupModal').select2({minimumResultsForSearch: Infinity});
    }
  }

  // Check all button initialization
  _initCheckAll() {
    new Checkall(document.querySelector('.check-all-container-checkbox-click .btn-custom-control'), {clickSelector: '.form-check'});
  }

  // Initializing list.js with the values
  _initListjs() {
    this.listjs = new List(
      document.querySelector('#orders'),
      {
        valueNames: ['id', 'name', 'email', 'phone', 'group', 'position', {name: 'thumb', attr: 'src'}],
        item: 'orderItemTemplate',
        page: 8,
        pagination: [
          {
            includeDirectionLinks: true,
            leftDirectionText: '<i class="cs-chevron-left"></i>',
            rightDirectionText: '<i class="cs-chevron-right"></i>',
            liClass: 'page-item',
            aClass: 'page-link shadow',
            innerWindow: 1000, // Hiding ellipsis
          },
        ],
      },
      this.orders,
    );
    this.listjs.sort('id', {orders: 'desc'});
    this.listjs.on('updated', function (obj) {});
  }

  // List item click event
  _onContainerClick(event) {
    if (!event.target.closest('.view-click')) {
      return;
    }
    event.preventDefault();
    const parent = event.target.closest('.card');
    const id = parent.querySelector('.id').innerHTML;
    this.currentItem = this.listjs.get('id', id)[0];
    this._showDetailModal();
  }

  // Empty modal to add new
  _showAddModal(event) {
    this._clearAddEditModal();
    this._enableAdd();
    this.orderModal.show();
  }

  // Shows item on the modal after click
  _showDetailModal() {
    document.getElementById('orderNameModal').value = this.currentItem.values().name;
    document.getElementById('orderPositionModal').value = this.currentItem.values().position;
    document.getElementById('orderEmailModal').value = this.currentItem.values().email;
    document.getElementById('orderPhoneModal').value = this.currentItem.values().phone;
    document.getElementById('orderGroupModal').value = this.currentItem.values().group;
    document.getElementById('orderThumbModal').setAttribute('src', this.currentItem.values().thumb);

    jQuery('#orderGroupModal').trigger('change');
    this.orderModal.show();
    this._enableEdit();
  }

  // Updating an item
  _saveOrder() {
    const id = this.currentItem.values().id;
    const valuesFromModal = this._getCurrentDataFromModal(id);
    this.currentItem.values(valuesFromModal);
    this.orderModal.hide();
    // Data can be synced here with the backend
  }

  // Adding a new item
  _addOrder() {
    const items = this.listjs.items.map((item) => item.values());
    const nextId = Helpers.NextId(items, 'id');
    const newOrder = this._getCurrentDataFromModal(nextId);
    this.listjs.add(newOrder);
    this.orderModal.hide();
    // this.listjs.update();
    this.listjs.sort('id', {orders: 'desc'});

    // Data can be synced here with the backend
  }

  // Showing confirmation for deleting an item
  _deleteOrder(event) {
    this.deletingMultiple = false;
    document.getElementById('deleteConfirmDetail').innerHTML = this.currentItem.values().name;
    this.deleteConfirmModal.show();
  }

  // Showing confirmation for deleting multiple items
  _deleteChecked(event) {
    this.deletingMultiple = true;
    const selectedItems = document.querySelectorAll('.list .card.selected');
    if (selectedItems.length > 0) {
      document.getElementById('deleteConfirmDetail').innerHTML = selectedItems.length + ' item' + (selectedItems.length > 1 ? 's' : '');
      this.deleteConfirmModal.show();
    }
  }

  // Deleting an item or multiple based on the deletingMultiple variable
  _deleteOrderConfirm(event) {
    if (this.deletingMultiple) {
      // Deleting multiple items
      const selectedItems = document.querySelectorAll('.list .card.selected');
      selectedItems.forEach((item) => {
        this.listjs.remove('id', item.querySelector('.id').innerHTML);
      });
    } else {
      // Deleting single item
      const id = this.currentItem.values().id;
      this.listjs.remove('id', id);
    }
    this.orderModal.hide();
    this.deleteConfirmModal.hide();
    const checkAllInput = document.querySelector('.check-all-container-checkbox-click .btn-custom-control input');
    checkAllInput.indeterminate = false;
    checkAllInput.checked = false;
    // Data can be synced here with the backend
  }

  // Getting values from the inputs
  _getCurrentDataFromModal(id) {
    return {
      name: document.getElementById('orderNameModal').value,
      position: document.getElementById('orderPositionModal').value,
      email: document.getElementById('orderEmailModal').value,
      phone: document.getElementById('orderPhoneModal').value,
      group: document.getElementById('orderGroupModal').value,
      thumb: document.getElementById('orderThumbModal').getAttribute('src'),
      id: id,
    };
  }

  // Simple image uplader
  _initProfileUpload() {
    if (typeof SingleImageUpload !== 'undefined') {
      const singleImageUpload = new SingleImageUpload(document.getElementById('imageUpload'), {
        fileSelectCallback: (file) => {
          console.log(file);
          // Upload the file with fetch method
          // let formData = new FormData();
          // formData.append("file", file);
          // formData.append("id", this.currentItemData.id);
          // fetch('/upload/image', { method: "POST", body: formData });
        },
      });
    }
  }

  // Clearing values of the modal
  _clearAddEditModal() {
    document.getElementById('orderNameModal').value = '';
    document.getElementById('orderPositionModal').value = '';
    document.getElementById('orderEmailModal').value = '';
    document.getElementById('orderPhoneModal').value = '';
    document.getElementById('orderGroupModal').value = null;
    document.getElementById('orderThumbInputModal').value = null;
    document.getElementById('orderThumbModal').setAttribute('src', this.settings.emptyThumb);
    jQuery('#orderGroupModal').trigger('change');
  }

  _enableEdit() {
    this._showElement('saveOrder');
    this._showElement('deleteOrder');
    this._hideElement('addOrder');
  }

  _enableAdd() {
    this._hideElement('saveOrder');
    this._hideElement('deleteOrder');
    this._showElement('addOrder');
  }

  _showElement(selector) {
    document.getElementById(selector) && document.getElementById(selector).classList.add('d-inline-block');
    document.getElementById(selector) && document.getElementById(selector).classList.remove('d-none');
  }

  _hideElement(selector) {
    document.getElementById(selector) && document.getElementById(selector).classList.remove('d-inline-block');
    document.getElementById(selector) && document.getElementById(selector).classList.add('d-none');
  }
}
